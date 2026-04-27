<?php
/**
 * Reusable JSON-LD schema builders for site-wide SEO consistency.
 *
 * Pages set $schema before including partials/head.php.
 * Use these helpers to build schema graphs without repeating boilerplate.
 *
 * Usage:
 *   require_once __DIR__ . '/../partials/_seo.php';
 *   $schema = shrutam_schema_graph([
 *       shrutam_breadcrumb([
 *           ['name' => 'Home', 'url' => 'https://shrutam.ai/'],
 *           ['name' => 'FAQ',  'url' => 'https://shrutam.ai/faq/'],
 *       ]),
 *       // ...other schema nodes
 *   ]);
 */

/**
 * Wrap an array of schema nodes in a @graph for one-script JSON-LD output.
 */
function shrutam_schema_graph(array $nodes): string
{
    return json_encode([
        '@context' => 'https://schema.org',
        '@graph'   => array_values(array_filter($nodes)),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}

/**
 * Build a BreadcrumbList from [['name' => ..., 'url' => ...], ...].
 */
function shrutam_breadcrumb(array $items): array
{
    return [
        '@type'           => 'BreadcrumbList',
        'itemListElement' => array_map(static function (int $i, array $item): array {
            return [
                '@type'    => 'ListItem',
                'position' => $i + 1,
                'name'     => $item['name'],
                'item'     => $item['url'],
            ];
        }, array_keys($items), $items),
    ];
}

/**
 * Reference to the EducationalOrganization defined on the homepage.
 * Use this in inner-page schema instead of repeating the full org definition.
 */
function shrutam_org_ref(): array
{
    return ['@id' => 'https://shrutam.ai/#org'];
}

/**
 * Standard "free Shrutam course" Offer node.
 */
function shrutam_free_offer(): array
{
    return [
        '@type'         => 'Offer',
        'price'         => '0',
        'priceCurrency' => 'INR',
        'category'      => 'Free',
        'availability'  => 'https://schema.org/InStock',
    ];
}

/**
 * Standard "₹199/month Shrutam Pro" Offer node.
 */
function shrutam_pro_offer(): array
{
    return [
        '@type'         => 'Offer',
        'price'         => '199',
        'priceCurrency' => 'INR',
        'availability'  => 'https://schema.org/PreOrder',
        'url'           => 'https://shrutam.ai/pricing/',
    ];
}
