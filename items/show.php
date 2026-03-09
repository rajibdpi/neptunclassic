<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>
<?php
$itemTitle = metadata('item', array('Dublin Core', 'Title'));
$creator   = metadata('item', array('Dublin Core', 'Creator'));
$date      = metadata('item', array('Dublin Core', 'Date'));
$subject   = metadata('item', array('Dublin Core', 'Subject'));
$desc      = metadata('item', array('Dublin Core', 'Description'));
$identifier= metadata('item', array('Dublin Core', 'Identifier'));
$relation  = metadata('item', array('Dublin Core', 'Relation'));
?>
<section class="hero item-hero">
    <div class="container item-grid">
        <div class="viewer-panel">
            <?php echo neptunclassic_render_viewer(); ?>
        </div>
        <aside class="meta-panel">
            <p class="record-type">Item</p>
            <h1><?php echo $itemTitle; ?></h1>

            <div class="meta-list">
                <?php if ($creator): ?><div class="meta-row"><span>Creator</span><strong><?php echo $creator; ?></strong></div><?php endif; ?>
                <?php if ($date): ?><div class="meta-row"><span>Date</span><strong><?php echo $date; ?></strong></div><?php endif; ?>
                <?php if ($subject): ?><div class="meta-row"><span>Subject</span><strong><?php echo $subject; ?></strong></div><?php endif; ?>
                <?php if ($identifier): ?><div class="meta-row"><span>Identifier</span><strong class="wrap-anywhere"><?php echo $identifier; ?></strong></div><?php endif; ?>
                <?php if ($relation): ?><div class="meta-row"><span>Relation</span><strong class="wrap-anywhere"><?php echo $relation; ?></strong></div><?php endif; ?>
                <?php if (metadata('item', 'Collection Name')): ?><div class="meta-row"><span>Collection</span><strong><?php echo link_to_collection_for_item(); ?></strong></div><?php endif; ?>
            </div>

            <div class="cta-stack">
                <?php echo link_to_previous_item_show('← Previous item', array('class' => 'text-link')); ?>
                <?php echo link_to_next_item_show('Next item →', array('class' => 'text-link')); ?>
            </div>
        </aside>
    </div>
</section>

<section class="section-wrap">
    <div class="container detail-grid">
        <div>
            <?php if ($desc): ?>
            <section class="detail-card">
                <h2>Description</h2>
                <div class="prose"><?php echo $desc; ?></div>
            </section>
            <?php endif; ?>

            <section class="detail-card">
                <h2>Full metadata</h2>
                <?php echo all_element_texts('item'); ?>
            </section>
        </div>

        <aside>
            <section class="detail-card side-card">
                <h3>Citation</h3>
                <p><?php echo strip_formatting($itemTitle); ?>. <?php echo html_escape(option('site_title')); ?>.</p>
            </section>
            <section class="detail-card side-card">
                <h3>IIIF tip</h3>
                <p>Paste a manifest URL into Dublin Core Identifier or Relation to show an inline IIIF viewer.</p>
            </section>
            <?php if (metadata('item', 'has files')): ?>
            <section class="detail-card side-card">
                <h3>Files</h3>
                <?php echo files_for_item(); ?>
            </section>
            <?php endif; ?>
        </aside>
    </div>
</section>

<?php echo foot(); ?>
