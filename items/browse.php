<?php echo head(array('title' => __('Browse Items'), 'bodyclass' => 'items browse')); ?>
<section class="hero browse-hero">
    <div class="container browse-hero-inner">
        <div>
            <p class="hero-badge">Discovery</p>
            <h1>Browse items</h1>
            <p class="hero-lead">A modern card-based browsing interface for archival collections, image records, reports, and exhibits.</p>
        </div>
    </div>
</section>

<section class="section-wrap">
    <!-- <div class="container archive-toolbar">
        <div><?php echo pagination_links(); ?></div>
        <div><?php echo item_search_filters(); ?></div>
    </div> -->
    <div class="container card-grid">
        <?php foreach (loop('items') as $item): ?>
            <article class="record-card">
                <a class="record-thumb" href="<?php echo html_escape(record_url($item)); ?>"><?php echo neptunclassic_record_thumb($item); ?></a>
                <div class="record-body">
                    <p class="record-type">Item</p>
                    <h3><a href="<?php echo html_escape(record_url($item)); ?>"><?php echo metadata($item, array('Dublin Core', 'Title')); ?></a></h3>
                    <p><?php echo html_escape(neptunclassic_excerpt(metadata($item, array('Dublin Core', 'Description')), 22)); ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
    <div class="container pagination-bottom"><?php echo pagination_links(); ?></div>
</section>
<?php echo foot(); ?>
