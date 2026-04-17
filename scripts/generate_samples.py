#!/usr/bin/env python3
"""Generate SAAVI voice sample content for hero chapters.

Hardcoded high-quality samples for Class 9-10 Science + Maths,
CBSE and CG Board. No API calls needed — run directly.

Output: content/samples/{board}-{class}-{subject}-samples.json
"""
import json
import os

SAMPLES_DIR = "content/samples"

# ---------------------------------------------------------------------------
# SAMPLE DATA — hand-crafted, SAAVI voice, all 8 files
# ---------------------------------------------------------------------------

SAMPLE_DATA = {

    # =========================================================================
    # CBSE CLASS 10 SCIENCE
    # =========================================================================
    "cbse-10-science-samples.json": {
        "board": "cbse",
        "class": 10,
        "subject": "science",
        "samples": [
            # Chapter 1: Chemical Reactions and Equations
            {
                "chapter_number": 1,
                "chapter_title": "Chemical Reactions and Equations",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "रोज़मर्रा की Chemical Reaction",
                            "content": "सुबह रोटी सेंकते समय आटा भूरा और खुशबूदार हो जाता है — यह सिर्फ heat नहीं है, यह एक real chemical reaction है! आटे के molecules टूटते हैं, नये compounds बनते हैं, और इसीलिए raw dough से अलग smell आती है। जब भी नये substances बनें, समझ लो — chemical change हुआ।",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: Rust सिर्फ Iron पे?",
                            "wrong": "Rust सिर्फ iron पे ही होता है",
                            "correct": "नहीं! Copper पे भी corrosion होता है — वो green layer जो पुराने तांबे के बर्तनों पे दिखती है, उसे patina कहते हैं। Silver भी काला पड़ता है — dono chemical reactions हैं।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "घर पे करो: Oxidation देखो",
                            "content": "एक iron nail लो। आधा नींबू काटो और nail उस पर रखो। 2 दिन बाद देखो — nail का रंग बदलेगा, लाल-भूरा होगा। यह oxidation है। Lemon का acid reaction को तेज़ करता है। Note करो: nail का mass थोड़ा बदला क्या?",
                            "cta": "ऐप में interactive experiment देखो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "Everyday Chemical Reaction",
                            "content": "When you toast a roti on the tawa, the dough turns brown and fragrant — that's not just heat, it's a real chemical reaction! The molecules in the flour break apart and form new compounds, which is why it smells different from raw dough. Whenever new substances are formed, you know a chemical change has happened.",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Rust Only on Iron?",
                            "wrong": "Rust only happens on iron",
                            "correct": "Not true! Copper also corrodes — that green layer on old copper vessels is called patina. Silver turns black too. Both are chemical reactions, just different metals.",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Try at Home: Watch Oxidation",
                            "content": "Take an iron nail. Cut half a lemon and place the nail on it. Check after 2 days — the nail will turn reddish-brown. That's oxidation. The acid in the lemon speeds up the reaction. Bonus: does the nail's mass change slightly?",
                            "cta": "See interactive experiment in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            },
            # Chapter 2: Acids, Bases and Salts
            {
                "chapter_number": 2,
                "chapter_title": "Acids, Bases and Salts",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "इमली और Acid — एक ही बात!",
                            "content": "इमली खट्टी क्यों होती है? क्योंकि उसमें tartaric acid होता है। नींबू में citric acid है, दही में lactic acid है — इसीलिए वो खट्टे हैं। जो भी cheez tum खाते हो जो खट्टी लगे, उसमें कोई acid ज़रूर है। Acid का मतलब dangerous नहीं — kitchen मे रोज़ use होता है।",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: Acid हमेशा खतरनाक?",
                            "wrong": "सभी acids dangerous और corrosive होते हैं",
                            "correct": "नहीं! Weak acids जैसे citric acid, acetic acid (सिरका) रोज़ खाने में use होते हैं। Dangerous तो strong acids होते हैं जैसे H₂SO₄। Concentration और strength में फर्क है।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "घर पे Natural Indicator बनाओ",
                            "content": "Red cabbage (बंद गोभी) के कुछ पत्ते उबालो। वो पानी purple होगा — यह natural indicator है। अब उसमें नींबू का रस डालो — pink/red हो जाएगा (acid)। फिर baking soda डालो — green/yellow हो जाएगा (base)। देखो science kitchen में है!",
                            "cta": "ऐप में pH scale visual देखो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "Tamarind and Acid — Same Thing!",
                            "content": "Why is tamarind sour? Because it contains tartaric acid. Lemon has citric acid, curd has lactic acid — that's why they all taste sour. Every sour food you eat contains some kind of acid. Acid doesn't mean dangerous — it's used in your kitchen every day.",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Are All Acids Dangerous?",
                            "wrong": "All acids are dangerous and corrosive",
                            "correct": "No! Weak acids like citric acid and acetic acid (vinegar) are used in food every day. Dangerous ones are strong acids like H₂SO₄. The key difference is concentration and strength.",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Make a Natural Indicator at Home",
                            "content": "Boil a few leaves of red cabbage. The water turns purple — that's your natural indicator. Add lemon juice — it turns pink/red (acid). Add baking soda — it turns green/yellow (base). Science is right there in your kitchen!",
                            "cta": "See pH scale visual in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            }
        ]
    },

    # =========================================================================
    # CBSE CLASS 10 MATHEMATICS
    # =========================================================================
    "cbse-10-mathematics-samples.json": {
        "board": "cbse",
        "class": 10,
        "subject": "mathematics",
        "samples": [
            # Chapter 1: Real Numbers
            {
                "chapter_number": 1,
                "chapter_title": "Real Numbers",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "HCF और रोज़ का काम",
                            "content": "मान लो तुम्हारे पास 48 samosas हैं और 36 cups of chai। तुम्हें equal packets बनाने हैं — हर packet में same number of samosas और chai हो। Maximum कितने packets बन सकते हैं? HCF(48, 36) = 12। तो 12 packets — हर एक में 4 samosas और 3 chai। यही है HCF का real use।",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: √2 को fraction में लिख सकते हैं?",
                            "wrong": "√2 को किसी fraction p/q के रूप में लिख सकते हैं",
                            "correct": "नहीं! √2 irrational है — यह proof by contradiction से साबित होता है। अगर √2 = p/q (in lowest terms) मानो, तो p² even होगा, p भी even, फिर q भी even — contradiction! इसीलिए √2 rational नहीं है।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Euclid's Algorithm — आज़माओ",
                            "content": "अपनी class के students की संख्या और rows की संख्या लो। Euclid's division algorithm से HCF निकालो। Step: divide करो, remainder लो, फिर remainder से divisor divide करो। Zero remainder आने तक। Last non-zero remainder = HCF। Fast और simple!",
                            "cta": "ऐप में step-by-step solver देखो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "HCF in Real Life",
                            "content": "Say you have 48 samosas and 36 cups of chai. You want to make equal packets — same samosas and chai in each. Max packets? HCF(48, 36) = 12. So 12 packets, each with 4 samosas and 3 chai. That's the real use of HCF — dividing things equally without waste.",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Can √2 be Written as a Fraction?",
                            "wrong": "√2 can be written as some fraction p/q",
                            "correct": "No! √2 is irrational — proved by contradiction. If √2 = p/q in lowest terms, then p² is even, so p is even, so q must also be even — that contradicts 'lowest terms'. Hence √2 is irrational.",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Try Euclid's Algorithm",
                            "content": "Take the number of students in your class and the number of rows. Use Euclid's division algorithm to find HCF. Divide, take remainder, then divide the previous divisor by the remainder. Keep going till remainder is 0. Last non-zero remainder is your HCF.",
                            "cta": "See step-by-step solver in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            },
            # Chapter 2: Polynomials
            {
                "chapter_number": 2,
                "chapter_title": "Polynomials",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "Parabola — Cricket की Ball का रास्ता",
                            "content": "जब cricketer ball फेंकता है, तो ball एक curve में जाती है — ऊपर और फिर नीचे। यह curve एक quadratic polynomial का graph है। अगर ball की height h = -5t² + 20t है, तो highest point कब? जब t = 2 sec। Graph पे यह point vertex है — parabola का सबसे ऊपरी point।",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: Zeroes मतलब polynomial zero है?",
                            "wrong": "Polynomial का 'zero' मतलब पूरी polynomial = 0",
                            "correct": "नहीं! Zero of a polynomial वो value of x है जहाँ polynomial की value 0 होती है। जैसे p(x) = x² - 5x + 6 के zeroes हैं x = 2 और x = 3 — क्योंकि p(2) = 0 और p(3) = 0।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "अपना Polynomial Graph बनाओ",
                            "content": "p(x) = x² - 4 लो। x = -3, -2, -1, 0, 1, 2, 3 के लिए values निकालो। Graph paper पर plot करो। देखो graph x-axis को कहाँ cross करता है — वहाँ zeroes हैं (x = 2 और x = -2)। यही graphical method है।",
                            "cta": "ऐप में interactive graph plotter देखो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "Parabola — The Path of a Cricket Ball",
                            "content": "When a cricketer throws the ball, it travels in a curve — up and then down. That curve is the graph of a quadratic polynomial. If the height is h = -5t² + 20t, when does it reach its highest point? At t = 2 sec. On the graph, that's the vertex — the topmost point of the parabola.",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Does 'Zero of Polynomial' Mean the Whole Thing is Zero?",
                            "wrong": "Zero of a polynomial means the entire polynomial equals zero",
                            "correct": "No! A zero of a polynomial is the value of x where the polynomial equals 0. For p(x) = x² - 5x + 6, the zeroes are x = 2 and x = 3 because p(2) = 0 and p(3) = 0.",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Draw Your Own Polynomial Graph",
                            "content": "Take p(x) = x² - 4. Find values for x = -3, -2, -1, 0, 1, 2, 3. Plot on graph paper. See where the graph crosses the x-axis — those are the zeroes (x = 2 and x = -2). That's the graphical method of finding zeroes.",
                            "cta": "See interactive graph plotter in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            }
        ]
    },

    # =========================================================================
    # CBSE CLASS 9 SCIENCE
    # =========================================================================
    "cbse-9-science-samples.json": {
        "board": "cbse",
        "class": 9,
        "subject": "science",
        "samples": [
            # Chapter 1: Matter in Our Surroundings
            {
                "chapter_number": 1,
                "chapter_title": "Matter in Our Surroundings",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "Chai और States of Matter",
                            "content": "चाय बनाते समय तीनों states of matter देखते हो। पानी liquid है, steam जो उठती है वो gas है, और चायपत्ती solid। जब kettle गर्म होता है, water evaporate होता है — यह liquid से gas में change है। Cool होने पर steam वापस water बनती है — condensation। सारी chemistry तुम्हारी रसोई में है!",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: Ice ठंडा होता है इसलिए Contract करता है?",
                            "wrong": "Water freeze होने पर सिकुड़ता है",
                            "correct": "उल्टा! Water freeze होने पर expand करता है — इसीलिए water की ice density कम है और वो float करती है। यही वजह है कि सर्दियों में pipe फट जाते हैं — पानी जमता है और फैलता है।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Diffusion देखो — बिना देखे",
                            "content": "एक कमरे के एक कोने में अगरबत्ती जलाओ। दूसरे कोने में बैठो। कितनी देर में smell आती है? Note करो। अब fan चलाओ — smell कितनी जल्दी आती है? यह diffusion है — gas molecules high concentration से low concentration की तरफ move करते हैं।",
                            "cta": "ऐप में molecules का animation देखो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "Chai and the Three States of Matter",
                            "content": "When you make chai, you see all three states of matter. Water is liquid, the steam rising is gas, and the tea leaves are solid. When the kettle heats up, water evaporates — liquid to gas. When it cools, steam turns back to water — that's condensation. All of chemistry is right in your kitchen.",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Does Ice Contract When Water Freezes?",
                            "wrong": "Water shrinks when it freezes",
                            "correct": "Actually the opposite! Water expands when it freezes — that's why ice is less dense than water and floats. It's also why pipes burst in winter — the water inside freezes and expands, cracking the pipe.",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Observe Diffusion — Without Seeing It",
                            "content": "Light an incense stick in one corner of a room. Sit in the opposite corner. Note how long it takes for the smell to reach you. Now turn on a fan — how much faster does it spread? That's diffusion — gas molecules moving from high concentration to low concentration.",
                            "cta": "See molecule animation in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            },
            # Chapter 2: Is Matter Around Us Pure?
            {
                "chapter_number": 2,
                "chapter_title": "Is Matter Around Us Pure?",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "Mixture और Pure Substance — आटे से समझो",
                            "content": "atta और नमक मिलाओ — यह mixture है। दोनों अपने properties retain करते हैं, tum उन्हें sieve से अलग कर सकते हो। लेकिन जब आटे में पानी मिलाओ और bread bake करो — एक नया substance बनता है। यह pure substance (compound) है जिसे आसानी से अलग नहीं कर सकते।",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: Pure मतलब Safe?",
                            "wrong": "Pure substance हमेशा safe और clean होता है",
                            "correct": "नहीं! Pure substance का मतलब है single type of matter — जैसे pure HCl बहुत dangerous है। Pure का मतलब 'safe' नहीं है, बस 'unmixed' है।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Chromatography — Sketch pen से",
                            "content": "एक filter paper strip लो। एक black sketch pen से बीच में एक dot बनाओ। Strip का निचला सिरा थोड़े पानी में डुबोओ (dot पानी में न डूबे)। देखो — as water rises, ink अलग-अलग colors में बंट जाती है। Black ink कई colors का mixture है!",
                            "cta": "ऐप में separation techniques देखो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "Mixture vs Pure Substance — Learn with Flour",
                            "content": "Mix flour and salt — that's a mixture. Both keep their own properties and you can separate them with a sieve. But when you mix flour with water and bake bread, a new substance is formed. That's a compound — you can't easily separate it back.",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Does 'Pure' Mean Safe?",
                            "wrong": "A pure substance is always safe and clean",
                            "correct": "No! Pure just means a single type of matter. Pure HCl is extremely dangerous. 'Pure' means unmixed, not safe.",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Chromatography with a Sketch Pen",
                            "content": "Take a strip of filter paper. Make a dot in the middle with a black sketch pen. Dip just the bottom edge in water (don't submerge the dot). Watch — as water rises, the ink separates into multiple colours. Black ink is a mixture of many colours!",
                            "cta": "See separation techniques in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            }
        ]
    },

    # =========================================================================
    # CBSE CLASS 9 MATHEMATICS
    # =========================================================================
    "cbse-9-mathematics-samples.json": {
        "board": "cbse",
        "class": 9,
        "subject": "mathematics",
        "samples": [
            # Chapter 1: Number Systems
            {
                "chapter_number": 1,
                "chapter_title": "Number Systems",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "Number Line और Auto का Meter",
                            "content": "Auto rickshaw का meter 0 से start होता है और आगे बढ़ता है — यह number line है। जब तुम negative numbers सुनते हो, सोचो: −5°C मतलब zero से 5 degree नीचे। Number line पे left of zero। Temperature, bank balance, depth — सब जगह negative numbers real हैं।",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: Irrational Number को Decimal में नहीं लिख सकते?",
                            "wrong": "Irrational numbers का decimal form नहीं होता",
                            "correct": "होता है, लेकिन वो non-terminating और non-repeating होता है। जैसे π = 3.14159265... बिना कभी repeat किए चलता रहता है। √2 = 1.41421356... भी।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "√2 को Number Line पे ढूंढो",
                            "content": "एक unit length का square बनाओ (1cm × 1cm)। Diagonal = √2 cm (Pythagoras से)। Compass से वो diagonal length number line पर 0 से mark करो — exactly √2 पर पहुंचोगे। Irrational भी number line पर real point है!",
                            "cta": "ऐप में geometric construction देखो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "Number Line and the Auto Meter",
                            "content": "An auto rickshaw meter starts at 0 and goes forward — that's a number line. When you hear negative numbers, think: −5°C means 5 degrees below zero, which is to the left on the number line. Temperature, bank balance, depth below sea level — negative numbers are real everywhere.",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Can Irrational Numbers Be Written as Decimals?",
                            "wrong": "Irrational numbers have no decimal form",
                            "correct": "They do — but it's non-terminating and non-repeating. For example π = 3.14159265... goes on forever without any pattern. Same with √2 = 1.41421356...",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Locate √2 on the Number Line",
                            "content": "Draw a square with side 1 cm. Its diagonal = √2 cm (by Pythagoras). Use a compass to transfer that diagonal length onto the number line from 0 — you land exactly on √2. Even irrational numbers are real points on the number line!",
                            "cta": "See geometric construction in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            },
            # Chapter 2: Polynomials
            {
                "chapter_number": 2,
                "chapter_title": "Polynomials",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "Polynomial — मिठाई की दुकान में",
                            "content": "मान लो एक mithai की दुकान में laddoo ₹10 का है और barfi ₹15 की। अगर तुम x laddoos और y barfis खरीदते हो, total cost = 10x + 15y। यह एक polynomial expression है — real life में हर जगह polynomials हैं, बस हम उन्हें नाम नहीं देते।",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: Monomial में सिर्फ एक Number?",
                            "wrong": "Monomial में सिर्फ एक number होता है",
                            "correct": "नहीं! Monomial में एक term होती है जिसमें variable भी हो सकता है। जैसे 5x², -3y, 7xyz — सब monomials हैं। Number of terms matters, coefficients नहीं।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Factor Tree से Polynomial Factor करो",
                            "content": "p(x) = x² + 5x + 6 लो। Think: कौन से दो numbers ऐसे हैं जिनका product 6 है और sum 5? Answer: 2 और 3। तो p(x) = (x+2)(x+3)। Check: (x+2)(x+3) को expand करो — same polynomial मिलेगा! यही factorization है।",
                            "cta": "ऐप में polynomial factoring tool देखो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "Polynomials in the Mithai Shop",
                            "content": "Say a mithai shop sells laddoos for ₹10 and barfi for ₹15. If you buy x laddoos and y barfis, total cost = 10x + 15y. That's a polynomial expression. Polynomials are everywhere in real life — we just don't give them that name.",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Does Monomial Mean Just One Number?",
                            "wrong": "A monomial contains only one number",
                            "correct": "No! A monomial is a single term that can include variables. 5x², -3y, 7xyz — all are monomials. It's about the number of terms, not the number of coefficients.",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Factorise a Polynomial Mentally",
                            "content": "Take p(x) = x² + 5x + 6. Ask: which two numbers multiply to 6 and add to 5? Answer: 2 and 3. So p(x) = (x+2)(x+3). Verify: expand (x+2)(x+3) and check you get the original polynomial. That's factorisation!",
                            "cta": "See polynomial factoring tool in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            }
        ]
    },

    # =========================================================================
    # CG CLASS 10 SCIENCE
    # =========================================================================
    "cg-10-science-samples.json": {
        "board": "cg",
        "class": 10,
        "subject": "science",
        "samples": [
            # Chapter 1: Chemical Reactions and Equations
            {
                "chapter_number": 1,
                "chapter_title": "Chemical Reactions and Equations",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "Bore-basi और Fermentation Reaction",
                            "content": "Bore-basi — रात का बचा हुआ भात जो पानी में भिगोया जाता है — यह सिर्फ खाना नहीं है, यह एक chemical reaction है! रात भर में bacteria rice के starch को ferment करते हैं, lactic acid बनती है। इसीलिए सुबह bore-basi थोड़ी खट्टी और ठंडी लगती है। यही fermentation reaction है।",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: Indravati का पानी साफ दिखता है — तो chemical-free है?",
                            "wrong": "नदी का साफ दिखने वाला पानी chemically pure होता है",
                            "correct": "नहीं! Indravati नदी का पानी भले transparent लगे, उसमें dissolved salts, minerals, और sometimes bacteria होते हैं। Physical appearance और chemical composition अलग होते हैं।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Rusting — Bastar की Clay से Test करो",
                            "content": "एक iron nail को Bastar के junglon की नम मिट्टी में गाड़ो। दूसरी nail को सूखी जगह रखो। 3 दिन बाद तुलना करो। नम मिट्टी वाली nail ज़्यादा rust करेगी — क्योंकि moisture और oxygen dono मिलते हैं। यह corrosion reaction है।",
                            "cta": "ऐप में corrosion experiment देखो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "Bore-basi and Fermentation",
                            "content": "Bore-basi — leftover rice soaked in water overnight — isn't just food, it's a chemical reaction! Bacteria ferment the starch in the rice, producing lactic acid. That's why bore-basi tastes slightly sour and cool in the morning. This is fermentation — a real chemical change.",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Clear River Water = Chemically Pure?",
                            "wrong": "River water that looks clear is chemically pure",
                            "correct": "Not at all! The Indravati river may look transparent, but it contains dissolved salts, minerals, and sometimes bacteria. Physical appearance and chemical composition are different things.",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Test Rusting with Local Soil",
                            "content": "Push an iron nail into moist soil (like you'd find near Bastar's forests). Leave another nail in a dry spot. Compare after 3 days. The nail in moist soil rusts more — because both moisture and oxygen are present. That's a corrosion reaction.",
                            "cta": "See corrosion experiment in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            },
            # Chapter 2: Acids, Bases and Salts
            {
                "chapter_number": 2,
                "chapter_title": "Acids, Bases and Salts",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "Imli और Acid — Chhattisgarh का Flavor",
                            "content": "Chhattisgarh में imli (इमली) का use दाल, chutney, हर जगह होता है। Imli खट्टी क्यों? क्योंकि उसमें tartaric acid और citric acid होते हैं। जब भी tum imli खाते हो — तुम actually एक weak acid consume कर रहे हो। Acids सिर्फ lab में नहीं होते!",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: Base हमेशा Soap जैसा Slippery होता है?",
                            "wrong": "सभी bases slippery और soapy feel देते हैं",
                            "correct": "Strong bases जैसे NaOH slippery लगते हैं क्योंकि वो skin के fats को saponify करते हैं — dangerous! Weak bases जैसे baking soda सुरक्षित है। Slipperiness ≠ all bases।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Haldi Indicator — घर पर pH Test",
                            "content": "हल्दी (turmeric) एक natural indicator है। हल्दी को थोड़े पानी में घोलो — yellow solution बनेगा। अब नींबू का रस डालो — yellow रहेगा (acid)। Soap का पानी डालो — लाल/orange हो जाएगा (base)। Chhattisgarh की kitchen ही science lab है!",
                            "cta": "ऐप में indicators comparison देखो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "Imli and Acid — Chhattisgarh's Favourite Flavour",
                            "content": "In Chhattisgarh, imli is used everywhere — dal, chutney, snacks. Why is it sour? Because it contains tartaric and citric acids. Every time you eat imli, you're consuming a weak acid. Acids aren't just in labs!",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Are All Bases Slippery Like Soap?",
                            "wrong": "All bases feel slippery and soapy",
                            "correct": "Strong bases like NaOH feel slippery because they saponify skin fats — and they're dangerous. Weak bases like baking soda are safe. Slipperiness is a property of strong bases, not all bases.",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Haldi as a pH Indicator",
                            "content": "Turmeric is a natural indicator. Dissolve a pinch in water — yellow solution. Add lemon juice — stays yellow (acid). Add soapy water — turns red/orange (base). The Chhattisgarh kitchen is a science lab!",
                            "cta": "See indicators comparison in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            }
        ]
    },

    # =========================================================================
    # CG CLASS 10 MATHEMATICS
    # =========================================================================
    "cg-10-mathematics-samples.json": {
        "board": "cg",
        "class": 10,
        "subject": "mathematics",
        "samples": [
            # Chapter 1: Real Numbers
            {
                "chapter_number": 1,
                "chapter_title": "Real Numbers",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "HCF — Bastar के बाज़ार में",
                            "content": "Bastar के हाट में एक किसान के पास 84 kg dhaan (धान) है और 56 kg maize है। वो equal-weight bags बनाना चाहता है — हर bag में same weight हो। Maximum कितना kg हर bag में? HCF(84, 56) = 28। हर bag में 28 kg — 3 bags dhaan के, 2 bags maize के। HCF का real use!",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: LCM हमेशा बड़ा होता है HCF से?",
                            "wrong": "LCM हमेशा HCF से बड़ा होता है",
                            "correct": "Almost always true, लेकिन exception है: जब दो numbers equal हों, जैसे 6 और 6, तो HCF = LCM = 6। General rule: LCM × HCF = Product of two numbers।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Indravati के Cycle से LCM",
                            "content": "मान लो Indravati नदी के किनारे दो boats हैं। Boat A हर 6 minutes में वापस आती है, Boat B हर 8 minutes में। दोनों एक साथ कब आएंगी? LCM(6, 8) = 24 minutes। LCM वो smallest time है जब दोनों events साथ होते हैं।",
                            "cta": "ऐप में LCM visual देखो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "HCF at Bastar's Haat Market",
                            "content": "At a Bastar haat, a farmer has 84 kg of dhaan and 56 kg of maize. He wants to pack them in equal-weight bags. Maximum weight per bag? HCF(84, 56) = 28. So each bag holds 28 kg — 3 bags of dhaan, 2 of maize. That's HCF in real action.",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Is LCM Always Greater Than HCF?",
                            "wrong": "LCM is always greater than HCF",
                            "correct": "Almost always, but not when two numbers are equal. If both numbers are 6, then HCF = LCM = 6. The general rule is: LCM × HCF = Product of the two numbers.",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "LCM with Boats on the Indravati",
                            "content": "Imagine two boats on the Indravati river. Boat A returns every 6 minutes, Boat B every 8 minutes. When do they return together? LCM(6, 8) = 24 minutes. LCM is the smallest time when two repeating events happen simultaneously.",
                            "cta": "See LCM visual in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            },
            # Chapter 2: Polynomials
            {
                "chapter_number": 2,
                "chapter_title": "Polynomials",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "Polynomial — Bhains के दूध की Calculation",
                            "content": "मान लो एक bhains (भैंस) रोज़ x litres दूध देती है। एक हफ्ते में total दूध = 7x litres। अगर दूध ₹40/litre है, income = 40 × 7x = 280x। यह एक linear polynomial है। अगर दूध घटता-बढ़ता है: output = 5x² - 3x + 10 — quadratic polynomial। हर calculation polynomial है!",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: Degree मतलब Coefficients की संख्या?",
                            "wrong": "Polynomial की degree उसके coefficients की संख्या है",
                            "correct": "नहीं! Degree है highest power of variable। p(x) = 3x⁴ + 2x² + 7x + 1 की degree 4 है — चाहे terms कितनी भी हों। Power देखो, terms नहीं।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Zero of Polynomial — Guess करो",
                            "content": "p(x) = 2x - 6 लो। p(x) = 0 कब होगा? 2x - 6 = 0, x = 3। Check: p(3) = 2(3) - 6 = 0. ✓ अब try करो p(x) = x² - 9। Clue: (x-3)(x+3) = x² - 9। Zeroes क्या हैं? Graph पे x-axis crossing points!",
                            "cta": "ऐप में zero-finding game खेलो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "Polynomials — Bhains Milk Calculation",
                            "content": "Say a bhains gives x litres of milk daily. Weekly total = 7x litres. At ₹40/litre, income = 280x. That's a linear polynomial. If output varies: 5x² - 3x + 10 — that's quadratic. Every real-life calculation is a polynomial in disguise!",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Does Degree Mean Number of Coefficients?",
                            "wrong": "The degree of a polynomial is the count of its coefficients",
                            "correct": "No! Degree is the highest power of the variable. In p(x) = 3x⁴ + 2x² + 7x + 1, the degree is 4. Count the power, not the terms.",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Find the Zero — Guess and Check",
                            "content": "Take p(x) = 2x - 6. When is p(x) = 0? Solve: 2x - 6 = 0 → x = 3. Check: p(3) = 2(3) - 6 = 0. ✓ Now try p(x) = x² - 9. Hint: (x-3)(x+3) = x² - 9. What are the zeroes? They're the points where the graph crosses the x-axis!",
                            "cta": "Play the zero-finding game in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            }
        ]
    },

    # =========================================================================
    # CG CLASS 9 SCIENCE
    # =========================================================================
    "cg-9-science-samples.json": {
        "board": "cg",
        "class": 9,
        "subject": "science",
        "samples": [
            # Chapter 1: Matter in Our Surroundings
            {
                "chapter_number": 1,
                "chapter_title": "Matter in Our Surroundings",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "Indravati का पानी और States of Matter",
                            "content": "Indravati नदी के किनारे बैठो। पानी liquid है। धूप में नदी की surface से water vapour उठती है — वो gas (water vapour) है। सर्दियों में किनारे की मिट्टी freeze हो जाती है — वो solid। एक ही substance (H₂O) तीनों states में! States matter की property हैं, molecule नहीं बदलता।",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: Bhains का दूध उबलने पर Chemically Change होता है?",
                            "wrong": "Bhains का दूध उबालने पर chemical change होता है",
                            "correct": "नहीं! Boiling एक physical change है — दूध का composition नहीं बदलता, बस temperature बढ़ती है और bacteria मरते हैं (pasteurization effect)। Chemical change तब होता जब नये substances बनें।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Evaporation — Bastar की गर्मी में",
                            "content": "एक wet cloth को धूप में रखो और एक छांव में। Note करो कौन पहले सूखता है। फिर try करो: एक wet cloth पर fan चलाओ। Surface area, temperature, और wind speed — तीनों evaporation को affect करते हैं। Bastar की गर्मी science का experiment है!",
                            "cta": "ऐप में evaporation factors देखो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "Indravati River and the Three States",
                            "content": "Sit by the Indravati river. The water is liquid. In sunlight, water vapour rises from the surface — that's gas. In winter, the mud on the banks freezes — that's solid. The same substance (H₂O) in three states! States are properties of matter; the molecule itself doesn't change.",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Does Boiling Bhains Milk Cause a Chemical Change?",
                            "wrong": "Boiling buffalo milk causes a chemical change",
                            "correct": "No! Boiling is a physical change — the composition of the milk doesn't change, just the temperature rises and bacteria are killed. A chemical change would create entirely new substances.",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Evaporation in Bastar's Heat",
                            "content": "Place one wet cloth in sunlight and another in shade. Note which dries first. Then try: fan a wet cloth. Surface area, temperature, and wind speed all affect evaporation rate. Bastar's summer heat is a free science experiment!",
                            "cta": "See evaporation factors in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            },
            # Chapter 2: Is Matter Around Us Pure?
            {
                "chapter_number": 2,
                "chapter_title": "Is Matter Around Us Pure?",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "Bore-basi — Mixture या Pure Substance?",
                            "content": "Bore-basi में चावल, पानी, नमक — यह एक mixture है। हर component अपनी identity रखता है। लेकिन जब bore-basi ferment होती है और lactic acid बनती है — अब chemical change हुआ, नया substance बना। Mixture physical है, compound chemical।",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: Filtered Water = Pure Water?",
                            "wrong": "Filter किया हुआ पानी chemically pure होता है",
                            "correct": "नहीं! Filtration सिर्फ suspended particles हटाता है — dissolved salts और minerals रहते हैं। Chemically pure water के लिए distillation चाहिए। Filtered ≠ Pure।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Crystallization — नमक से घर पर",
                            "content": "Saturated salt solution बनाओ (बहुत सारा नमक पानी में मिलाओ जब तक और न घुले)। एक string उसमें डुबोओ। 2-3 दिन बाद देखो — string पर salt crystals बनेंगे। यह crystallization है — pure salt को mixture से अलग करने का तरीका।",
                            "cta": "ऐप में purification methods देखो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "Bore-basi — Mixture or Pure Substance?",
                            "content": "Bore-basi contains rice, water, salt — it's a mixture. Each component keeps its own identity. But when it ferments and lactic acid is formed — now a new substance has been created through a chemical change. Mixture is physical; compound is chemical.",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Is Filtered Water Chemically Pure?",
                            "wrong": "Filtered water is chemically pure",
                            "correct": "No! Filtration only removes suspended particles — dissolved salts and minerals remain. For chemically pure water, you need distillation. Filtered ≠ Pure.",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Crystallisation with Salt at Home",
                            "content": "Make a saturated salt solution — keep adding salt until no more dissolves. Dip a string into it. After 2-3 days, salt crystals will form on the string. That's crystallisation — a way to separate a pure solid from a mixture.",
                            "cta": "See purification methods in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            }
        ]
    },

    # =========================================================================
    # CG CLASS 9 MATHEMATICS
    # =========================================================================
    "cg-9-mathematics-samples.json": {
        "board": "cg",
        "class": 9,
        "subject": "mathematics",
        "samples": [
            # Chapter 1: Number Systems
            {
                "chapter_number": 1,
                "chapter_title": "Number Systems",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "Number Line — Indravati के किनारे",
                            "content": "Indravati नदी के किनारे एक सीधी रेखा खींचो — यह number line है। बाढ़ का पानी जब किनारे से ऊपर आए — positive। जब नीचे हो — negative। जब किसान के account में ₹500 हो — positive 500। जब ₹200 का loan हो — negative 200। Number line सिर्फ paper पर नहीं, जीवन में भी है।",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: 0 न Positive है, न Negative — तो Number नहीं?",
                            "wrong": "0 कोई real number नहीं है क्योंकि यह positive या negative नहीं है",
                            "correct": "0 एक real number है — actually एक बहुत important one! यह positive और negative numbers के बीच में है। Number line पर origin (शुरुआत) है। 0 के बिना number system अधूरा है।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Surds — Bastar की ज़मीन से",
                            "content": "मान लो एक square खेत है जिसका area 5 square meters है। Side = √5 meters। √5 ≈ 2.236... — यह irrational है। Number line पर compass से mark करो: 2 unit का एक side, 1 unit का दूसरा — hypotenuse = √5। यह exact point है number line पर!",
                            "cta": "ऐप में surds construction देखो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "Number Line — Along the Indravati",
                            "content": "Draw a straight line along the Indravati riverbank — that's a number line. When flood water rises above the bank — positive. When it's below — negative. A farmer with ₹500 in his account: positive 500. With a ₹200 loan: negative 200. Number lines exist in life, not just on paper.",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Is Zero Not a Real Number?",
                            "wrong": "Zero is not a real number because it's neither positive nor negative",
                            "correct": "Zero is absolutely a real number — and a crucial one! It sits between positive and negative, acting as the origin of the number line. The number system is incomplete without 0.",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Surds — From a Field in Bastar",
                            "content": "Say a square field has an area of 5 square metres. Its side = √5 metres. √5 ≈ 2.236... — irrational. Mark it on the number line using a compass: make a right triangle with sides 2 and 1. The hypotenuse = √5. That exact point is √5 on the number line!",
                            "cta": "See surds construction in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            },
            # Chapter 2: Polynomials
            {
                "chapter_number": 2,
                "chapter_title": "Polynomials",
                "blocks": {
                    "hi": [
                        {
                            "type": "example",
                            "heading": "Polynomial — Dhaan की Yield",
                            "content": "Chhattisgarh में एक किसान की dhaan (धान) की yield मानो h = -2x² + 12x + 20 है (x = fertilizer units)। यह quadratic polynomial है। Farmer जानना चाहता है — कितना fertilizer डालने पर maximum yield? यह polynomial का maximum point problem है — real life maths!",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "गलतफहमी: Constant Polynomial की कोई Degree नहीं?",
                            "wrong": "Constant polynomial जैसे p(x) = 7 की कोई degree नहीं होती",
                            "correct": "Constant polynomial (non-zero) की degree 0 होती है — क्योंकि 7 = 7x⁰। लेकिन zero polynomial (p(x) = 0) की degree undefined है — यह exception है।",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Remainder Theorem — बिना Division किए",
                            "content": "p(x) = x³ - 2x² + 3x - 5 है। p(2) निकालो: p(2) = 8 - 8 + 6 - 5 = 1। Remainder theorem कहता है: जब p(x) को (x-2) से divide करते हो, remainder = p(2) = 1। Check करो long division से — same answer! यह shortcut है।",
                            "cta": "ऐप में remainder theorem examples देखो →",
                            "icon": "flask-conical"
                        }
                    ],
                    "en": [
                        {
                            "type": "example",
                            "heading": "Polynomial — Dhaan Yield in Chhattisgarh",
                            "content": "A Chhattisgarh farmer's dhaan yield is modelled as h = -2x² + 12x + 20, where x is units of fertilizer. This is a quadratic polynomial. The farmer wants to know: how much fertilizer gives maximum yield? That's finding the maximum of a polynomial — real maths!",
                            "icon": "lightbulb"
                        },
                        {
                            "type": "misconception",
                            "heading": "Does a Constant Polynomial Have No Degree?",
                            "wrong": "A constant polynomial like p(x) = 7 has no degree",
                            "correct": "A non-zero constant polynomial has degree 0 — because 7 = 7x⁰. But the zero polynomial p(x) = 0 has undefined degree — that's the special exception.",
                            "icon": "triangle-alert"
                        },
                        {
                            "type": "activity",
                            "heading": "Remainder Theorem — No Long Division Needed",
                            "content": "Take p(x) = x³ - 2x² + 3x - 5. Find p(2): p(2) = 8 - 8 + 6 - 5 = 1. The Remainder Theorem says: when p(x) is divided by (x - 2), the remainder = p(2) = 1. Verify with long division — same answer! It's the shortcut.",
                            "cta": "See remainder theorem examples in app →",
                            "icon": "flask-conical"
                        }
                    ]
                }
            }
        ]
    },

}


def main():
    os.makedirs(SAMPLES_DIR, exist_ok=True)
    for filename, data in SAMPLE_DATA.items():
        path = os.path.join(SAMPLES_DIR, filename)
        with open(path, "w", encoding="utf-8") as f:
            json.dump(data, f, ensure_ascii=False, indent=2)
        print(f"Generated: {path}")
    print(f"\nDone. {len(SAMPLE_DATA)} files written to {SAMPLES_DIR}/")


if __name__ == "__main__":
    main()
