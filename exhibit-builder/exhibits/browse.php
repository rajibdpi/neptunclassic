<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>

<section class="section-wrap">
    <div class="container section-head">
        <div>
            <p class="section-kicker">Exhibits</p>
            <h1><?php echo $title; ?> <?php echo __('(%s total)', $total_results); ?></h1>
        </div>
        <div class="section-actions">
            <?php echo neptunclassic_layout_switcher('exhibits-browse-layout', 'neptunclassic-layout-exhibits-browse'); ?>
        </div>
    </div>

    <div class="container simple-page-shell">
        <article class="detail-card simple-page-card">
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
                    <div class="archive-toolbar archive-toolbar-compact">
                        <div><?php echo pagination_links(); ?></div>
                    </div>

                    <div id="exhibits-browse-layout" class="card-grid record-layout record-layout-grid">
                        <?php foreach (loop('exhibit') as $exhibit): ?>
                            <article class="record-card">
                                <?php if ($exhibitImage = record_image($exhibit)): ?>
                                    <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'record-thumb image')); ?>
                                <?php endif; ?>
                                <div class="record-body">
                                    <p class="record-type">Exhibit</p>
                                    <h2><?php echo link_to_exhibit(); ?></h2>
                                    <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                                        <div class="description"><?php echo $exhibitDescription; ?></div>
                                    <?php endif; ?>
                                    <?php if ($exhibitTags = tag_string('exhibit', 'exhibits')): ?>
                                        <p class="tags"><?php echo $exhibitTags; ?></p>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <div class="archive-toolbar archive-toolbar-compact">
                        <div><?php echo pagination_links(); ?></div>
                    </div>
                <?php else: ?>
                    <p><?php echo __('There are no exhibits available yet.'); ?></p>
                <?php endif; ?>
            </div>
        </article>
    </div>
</section>

<?php echo foot(); ?>
