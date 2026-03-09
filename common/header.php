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

        <div class="nav-tools">
            <form class="nav-search" role="search" action="<?php echo html_escape(url('items/browse')); ?>" method="get">
                <label class="screen-reader-text" for="nav-search-input">Search archive</label>
                <input id="nav-search-input" type="search" name="search" value="<?php echo isset($_GET['search']) ? html_escape($_GET['search']) : ''; ?>" placeholder="<?php echo html_escape(neptunclassic_theme_option('search_placeholder', 'Search the archive')); ?>">
                <button type="submit" aria-label="Search">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <circle cx="11" cy="11" r="6"></circle>
                        <path d="M20 20l-4.35-4.35"></path>
                    </svg>
                </button>
            </form>
            <nav class="main-nav" aria-label="Primary">
                <?php echo public_nav_main(); ?>
            </nav>
        </div>
    </div>
    <?php fire_plugin_hook('public_header', array('view' => $this)); ?>
</header>
<main class="site-main">
