<?php
$title = __('Browse Exhibits by Tag');
echo head(array('title' => $title, 'bodyclass' => 'exhibits tags'));
?>

<section class="section-wrap">
    <div class="container simple-page-shell">
        <article class="detail-card simple-page-card">
            <header class="simple-page-header">
                <p class="hero-badge">Exhibits</p>
                <h1><?php echo $title; ?></h1>
            </header>

            <div class="prose simple-page-content">
                <nav class="navigation exhibit-tags secondary-nav" id="secondary-nav">
                    <?php echo nav(array(
                        array(
                            'label' => __('Browse All'),
                            'uri' => url('exhibits/browse')
                        ),
                        array(
                            'label' => __('Browse by Tag'),
                            'uri' => url('exhibits/tags')
                        )
                    )); ?>
                </nav>

                <?php echo tag_cloud($tags, 'exhibits/browse'); ?>
            </div>
        </article>
    </div>
</section>

<?php echo foot(); ?>
