<?php

function neptunclassic_theme_option($name, $default = '')
{
    $value = get_theme_option($name);
    return strlen(trim((string) $value)) ? $value : $default;
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
