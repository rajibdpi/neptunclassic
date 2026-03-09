<?php
$isHomePage = function_exists('simple_pages_is_home_page') ? simple_pages_is_home_page($page) : false;
$title = metadata('simple_pages_page', 'title');
$text = metadata('simple_pages_page', 'text', array('no_escape' => true));

echo head(array(
    'title' => $isHomePage ? null : $title,
    'bodyclass' => 'simple-pages show',
    'bodyid' => metadata('simple_pages_page', 'slug'),
));
?>

<section class="section-wrap">
    <div class="container simple-page-shell">
        <article class="detail-card simple-page-card">
            <?php if (!$isHomePage): ?>
            <header class="simple-page-header">
                <p class="hero-badge">Page</p>
                <?php if (function_exists('simple_pages_display_breadcrumbs')): ?>
                    <p id="simple-pages-breadcrumbs" class="navigation secondary-nav">
                        <?php echo simple_pages_display_breadcrumbs(); ?>
                    </p>
                <?php endif; ?>
                <h1><?php echo html_escape($title); ?></h1>
            </header>
            <?php endif; ?>

            <div class="prose simple-page-content">
                <?php echo $this->shortcodes($text); ?>
            </div>
        </article>
    </div>
</section>

<?php echo foot(); ?>
