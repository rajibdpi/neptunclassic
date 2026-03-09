<?php

function neptunclassic_theme_option($name, $default = '')
{
    $value = get_theme_option($name);
    if (!strlen(trim((string) $value))) {
        $value = $default;
    }

    return html_entity_decode((string) $value, ENT_QUOTES, 'UTF-8');
}

function neptunclassic_theme_file_url($name, $default = '')
{
    $value = get_theme_option($name);
    $value = is_string($value) ? trim($value) : '';

    if ($value === '') {
        return $default;
    }

    if (preg_match('~^(?:https?:)?//~i', $value) || strpos($value, '/') === 0) {
        return html_entity_decode($value, ENT_QUOTES, 'UTF-8');
    }

    $storage = Zend_Registry::get('storage');
    $path = $storage->getPathByType($value, 'theme_uploads');

    return $storage->getUri($path);
}

function neptunclassic_asset_url($path)
{
    return src($path, '');
}

function neptunclassic_excerpt($text, $words = 28)
{
    $text = trim(strip_tags((string) $text));
    if ($text === '') {
        return '';
    }

    $parts = preg_split('/\s+/u', $text);
    if (count($parts) <= $words) {
        return implode(' ', $parts);
    }

    return implode(' ', array_slice($parts, 0, $words)) . '…';
}

function neptunclassic_find_manifest_url($item = null)
{
    if (!$item) {
        $item = get_current_record('item');
    }
    if (!$item) {
        return null;
    }

    $fields = array(
        array('Dublin Core', 'Identifier'),
        array('Dublin Core', 'Relation'),
        array('Item Type Metadata', 'Text'),
    );

    foreach ($fields as $field) {
        try {
            $value = metadata($item, $field, array('all' => false));
        } catch (Exception $e) {
            $value = null;
        }

        if (!is_string($value) || !$value) {
            continue;
        }

        if (preg_match('~https?://[^\s"\']+(manifest|iiif)[^\s"\']*~i', $value, $m)) {
            return html_entity_decode($m[0], ENT_QUOTES, 'UTF-8');
        }
        if (preg_match('~https?://[^\s"\']+/manifest(?:\.json)?(?:\?[^\s"\']*)?$~i', $value, $m)) {
            return html_entity_decode($m[0], ENT_QUOTES, 'UTF-8');
        }
    }

    return null;
}

function neptunclassic_render_viewer($item = null)
{
    if (!$item) {
        $item = get_current_record('item');
    }

    $manifestUrl = neptunclassic_find_manifest_url($item);

    if ($manifestUrl) {
        $uvBase = 'https://universalviewer.io/uv/uv.html';
        $src = $uvBase . '?manifest=' . rawurlencode($manifestUrl);
        return '<div class="iiif-shell"><iframe class="iiif-frame" title="IIIF Viewer" src="' . html_escape($src) . '" loading="lazy" allowfullscreen></iframe></div>';
    }

    return '<div class="viewer-fallback">' . item_image_gallery(array('linkToFile' => true), 'fullsize') . '</div>';
}

function neptunclassic_record_thumb($record, $size = 'square_thumbnail')
{
    $html = record_image($record, $size);
    if ($html) {
        return $html;
    }

    return '<div class="thumb-fallback"><span>No image</span></div>';
}

function neptunclassic_total_records($recordType)
{
    if (function_exists('total_records')) {
        return (int) total_records($recordType);
    }

    return 0;
}

function neptunclassic_document_types()
{
    return array(
        array(
            'label' => __('Manuscripts'),
            'description' => __('Handwritten records, notebooks, and archival papers.'),
            'href' => url('items/browse'),
        ),
        array(
            'label' => __('Photographs'),
            'description' => __('Visual documentation, portraits, and field photography.'),
            'href' => url('items/browse'),
        ),
        array(
            'label' => __('Maps'),
            'description' => __('Cartographic materials, plans, and geographic records.'),
            'href' => url('items/browse'),
        ),
        array(
            'label' => __('Printed Works'),
            'description' => __('Books, journals, pamphlets, and reference publications.'),
            'href' => url('items/browse'),
        ),
        array(
            'label' => __('Posters'),
            'description' => __('Exhibition graphics, announcements, and ephemera.'),
            'href' => url('items/browse'),
        ),
        array(
            'label' => __('Audio & Exhibits'),
            'description' => __('Interpretive resources, podcasts, and virtual exhibits.'),
            'href' => url('items/browse'),
        ),
    );
}
