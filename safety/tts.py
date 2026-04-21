#!/usr/bin/env python3
"""
Quick TTS — generates MP3 from text using Gemini 3.1 Flash TTS.
Zero dependencies (urllib only).

Usage: python3 tts.py "text to speak" output.mp3
Returns: output file path on success, empty on failure.
"""
import sys, os, json, wave, struct, subprocess, urllib.request
from pathlib import Path

# Load API keys from keys.json (gitignored)
_KEYS_FILE = Path(__file__).parent / 'keys.json'
_KEYS = json.loads(_KEYS_FILE.read_text()) if _KEYS_FILE.exists() else {}

GEMINI_KEY = os.environ.get('GOOGLE_AI_API_KEY') or _KEYS.get('GOOGLE_AI_API_KEY', '')
VOICE_PROMPT = '[Speak as SAAVI, a 26 year old Indian woman. Warm, natural, relaxed pace. Respectful aap.]'

def generate(text, output_path):
    try:
        import base64
        payload = json.dumps({
            'contents': [{'role':'user','parts':[{'text': VOICE_PROMPT + '\n\n' + text}]}],
            'generationConfig': {
                'responseModalities': ['AUDIO'],
                'speechConfig': {
                    'voiceConfig': {
                        'prebuiltVoiceConfig': {'voiceName': 'Leda'}
                    }
                }
            },
        }).encode()

        url = f'https://generativelanguage.googleapis.com/v1beta/models/gemini-3.1-flash-tts-preview:generateContent?key={GEMINI_KEY}'
        req = urllib.request.Request(url, data=payload, headers={'Content-Type': 'application/json'})

        with urllib.request.urlopen(req, timeout=10) as resp:
            data = json.loads(resp.read())

        for part in data.get('candidates', [{}])[0].get('content', {}).get('parts', []):
            inline = part.get('inlineData', {})
            if inline.get('data'):
                audio_bytes = base64.b64decode(inline['data'])

                wav_path = output_path + '.wav'
                with wave.open(wav_path, 'wb') as wf:
                    wf.setnchannels(1)
                    wf.setsampwidth(2)
                    wf.setframerate(24000)
                    wf.writeframes(audio_bytes)

                subprocess.run([
                    'ffmpeg', '-y', '-hide_banner', '-loglevel', 'warning',
                    '-i', wav_path, '-c:a', 'libmp3lame', '-b:a', '96k', output_path
                ], check=True, timeout=10)

                os.unlink(wav_path)
                return True

        return False
    except Exception:
        return False


if __name__ == '__main__':
    if len(sys.argv) < 3:
        sys.exit(1)
    text = sys.argv[1]
    output = sys.argv[2]
    if generate(text, output):
        print(output)
    else:
        print('')
