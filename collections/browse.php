<?php echo head(array('title' => __('Browse Collections'), 'bodyclass' => 'collections browse')); ?>
<section class="hero browse-hero">
    <div class="container browse-hero-inner">
        <div>
            <p class="hero-badge">Collections</p>
            <h1>Browse collections</h1>
            <p class="hero-lead">Group records into fonds, themes, series, and exhibitions with a refined archival presentation.</p>
        </div>
    </div>
</section>
<section class="section-wrap">
    <div class="container card-grid card-grid-collections">
        <?php foreach (loop('collections') as $collection): ?>
            <article class="record-card collection-card">
                <a class="record-thumb" href="<?php echo html_escape(record_url($collection)); ?>"><?php echo neptunclassic_record_thumb($collection); ?></a>
                <div class="record-body">
                    <p class="record-type">Collection</p>
                    <h3><a href="<?php echo html_escape(record_url($collection)); ?>"><?php echo metadata($collection, array('Dublin Core', 'Title')); ?></a></h3>
                    <p><?php echo html_escape(neptunclassic_excerpt(metadata($collection, array('Dublin Core', 'Description')), 22)); ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php echo foot(); ?>
