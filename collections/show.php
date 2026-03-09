<?php echo head(array('title' => metadata('collection', array('Dublin Core', 'Title')), 'bodyclass' => 'collections show')); ?>
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
                <h3>Items in this collection</h3>
                <?php echo browse_items(array('collection' => metadata('collection', 'id')), array('pagination' => false)); ?>
            </section>
        </aside>
    </div>
</section>
<?php echo foot(); ?>
