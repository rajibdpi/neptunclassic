<?php
$pageTitle = __('404 Page Not Found');
echo head(['title' => $pageTitle, 'bodyclass' => 'error error-404']);
?>

<section class="section-wrap">
    <div class="container simple-page-shell">
        <article class="detail-card simple-page-card">
            <header class="simple-page-header">
                <p class="hero-badge">Error</p>
                <h1><?php echo $pageTitle; ?></h1>
            </header>

            <div class="prose simple-page-content">
                <p><?php echo __('%s is not a valid URL.', html_escape($badUri)); ?></p>
            </div>
        </article>
    </div>
</section>

<?php echo foot(); ?>
