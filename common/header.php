<?php
queue_css_file('style');
queue_css_file('neptun');
queue_js_file('theme');
$accent = neptunclassic_theme_option('accent_color', '#1f4e79');
queue_css_string(':root{--accent:' . $accent . ';}');
$titleParts = array();
if (isset($title) && strlen(trim((string) $title))) {
    $titleParts[] = strip_formatting($title);
}
$titleParts[] = option('site_title');
?>
<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ($description = option('description')): ?>
        <meta name="description" content="<?php echo html_escape($description); ?>">
    <?php endif; ?>
    <title><?php echo implode(' · ', $titleParts); ?></title>
    <?php echo auto_discovery_link_tags(); ?>
    <?php fire_plugin_hook('public_head', array('view' => $this)); ?>
    <?php echo head_css(); ?>
    <?php echo head_js(); ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<?php fire_plugin_hook('public_body', array('view' => $this)); ?>
<header class="site-header">
    <div class="container topbar">
        <div class="brand-wrap">
            <?php $logo = theme_logo(); ?>
            <a class="brand" href="<?php echo html_escape(url('/')); ?>">
                <?php if ($logo): ?>
                    <?php echo $logo; ?>
                <?php else: ?>
                    <span class="brand-mark">N</span>
                    <span class="brand-text"><?php echo html_escape(option('site_title')); ?></span>
                <?php endif; ?>
            </a>
        </div>

        <nav class="main-nav" aria-label="Primary">
            <?php echo public_nav_main(); ?>
        </nav>
    </div>
    <?php fire_plugin_hook('public_header', array('view' => $this)); ?>
</header>
<main class="site-main">
