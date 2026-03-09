<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>

<section class="section-wrap">
    <div class="container simple-page-shell">
        <article class="detail-card simple-page-card">
            <header class="simple-page-header">
                <p class="hero-badge">Exhibits</p>
                <h1><?php echo $title; ?> <?php echo __('(%s total)', $total_results); ?></h1>
            </header>

            <div class="prose simple-page-content">
                <nav class="navigation secondary-nav">
                    <?php echo nav(array(
                        array(
                            'label' => __('Browse All'),
                            'uri' => url('exhibits')
                        ),
                        array(
                            'label' => __('Browse by Tag'),
                            'uri' => url('exhibits/tags')
                        )
                    )); ?>
                </nav>

                <?php if (count($exhibits) > 0): ?>
                    <?php echo pagination_links(); ?>

                    <?php foreach (loop('exhibit') as $exhibit): ?>
                        <article class="record-card">
                            <div class="record-body">
                                <p class="record-type">Exhibit</p>
                                <h2><?php echo link_to_exhibit(); ?></h2>
                                <?php if ($exhibitImage = record_image($exhibit)): ?>
                                    <div class="record-thumb">
                                        <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                                    <div class="description"><?php echo $exhibitDescription; ?></div>
                                <?php endif; ?>
                                <?php if ($exhibitTags = tag_string('exhibit', 'exhibits')): ?>
                                    <p class="tags"><?php echo $exhibitTags; ?></p>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>

                    <?php echo pagination_links(); ?>
                <?php else: ?>
                    <p><?php echo __('There are no exhibits available yet.'); ?></p>
                <?php endif; ?>
            </div>
        </article>
    </div>
</section>

<?php echo foot(); ?>
