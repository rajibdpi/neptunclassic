<?php
queue_css_file('style');
queue_css_file('neptun');
queue_js_file('theme');
$accent = neptunclassic_theme_option('accent_color', '#1f4e79');
queue_css_string(':root{--accent:' . $accent . ';}');
?>
<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <?php echo head_meta(); ?>
    <title><?php echo head_title(); ?></title>
    <?php echo head_css(); ?>
    <?php echo head_js(); ?>
    <?php echo plugin_header(); ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<header class="site-header">
    <div class="container topbar">
        <div class="brand-wrap">
            <?php $logo = get_theme_option('logo'); ?>
            <a class="brand" href="<?php echo html_escape(public_url()); ?>">
                <?php if ($logo): ?>
                    <img src="<?php echo html_escape($logo); ?>" alt="<?php echo html_escape(option('site_title')); ?>">
                <?php else: ?>
                    <span class="brand-mark">N</span>
                <?php endif; ?>
                <span class="brand-text"><?php echo html_escape(option('site_title')); ?></span>
            </a>
        </div>

        <nav class="main-nav" aria-label="Primary">
            <?php echo public_nav_main(); ?>
        </nav>
    </div>
</header>
<main class="site-main">
