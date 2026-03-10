<?php
$collectionId = metadata('collection', 'id');
$collectionTitle = metadata('collection', array('Dublin Core', 'Title'));
$collectionItems = get_records('Item', array('collection' => $collectionId), 0);
echo head(array('title' => $collectionTitle, 'bodyclass' => 'collections show'));
?>
<section class="section-wrap">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="section-kicker">Collection Items</p>
                <h2>Items in <b><?php echo html_escape($collectionTitle); ?></b></h2>
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
