<?php
$isHomePage = function_exists('simple_pages_is_home_page') ? simple_pages_is_home_page($page) : false;
echo head(array(
    'title' => $isHomePage ? null : html_escape($page->title),
    'bodyclass' => 'simple-pages show',
    'bodyid' => html_escape($page->slug),
));
?>

<section class="section-wrap">
    <div class="container simple-page-shell">
        <article class="detail-card simple-page-card">
            <?php if (!$isHomePage): ?>
            <header class="simple-page-header">
                <p class="hero-badge">Page</p>
                <h1><?php echo html_escape($page->title); ?></h1>
            </header>
            <?php endif; ?>

            <div class="prose simple-page-content">
                <?php echo eval('?>' . $page->text); ?>
            </div>
        </article>
    </div>
</section>

<?php echo foot(); ?>
