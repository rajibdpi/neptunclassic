<?php
$collectionId = metadata('collection', 'id');
$collectionItems = get_records('Item', array('collection' => $collectionId), 0);
echo head(array('title' => metadata('collection', array('Dublin Core', 'Title')), 'bodyclass' => 'collections show'));
?>
<section class="hero collection-hero">
    <div class="container collection-hero-inner">
        <div>
            <p class="hero-badge">Collection</p>
            <h1><?php echo metadata('collection', array('Dublin Core', 'Title')); ?></h1>
            <p class="hero-lead"><?php echo metadata('collection', array('Dublin Core', 'Description')); ?></p>
        </div>
    </div>
</section>
<section class="section-wrap">
    <div class="container detail-grid">
        <div>
            <section class="detail-card">
                <h2>Collection metadata</h2>
                <?php echo all_element_texts('collection'); ?>
            </section>
        </div>
        <aside>
            <section class="detail-card side-card">
                <h3>Collection summary</h3>
                <p><?php echo count($collectionItems); ?> item<?php echo count($collectionItems) === 1 ? '' : 's'; ?> in this collection.</p>
            </section>
        </aside>
    </div>
</section>
<section class="section-wrap">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="section-kicker">Collection Items</p>
                <h2>Items in this collection</h2>
            </div>
        </div>
        <?php if ($collectionItems): ?>
            <div class="card-grid">
                <?php foreach ($collectionItems as $item): ?>
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
        <?php else: ?>
            <section class="detail-card">
                <p>No items are currently assigned to this collection.</p>
            </section>
        <?php endif; ?>
    </div>
</section>
<?php echo foot(); ?>
