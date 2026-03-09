<?php echo head(array('bodyclass' => 'home')); ?>
<?php
$badge = neptunclassic_theme_option('hero_badge', 'Digital Archive');
$title = neptunclassic_theme_option('hero_title', option('site_title'));
$text  = neptunclassic_theme_option('hero_text', option('description'));
$placeholder = neptunclassic_theme_option('search_placeholder', 'Search the archive');
$heroImage = neptunclassic_theme_file_url('hero_image', img('hero.jpg'));
$featuredItemsTitle = neptunclassic_theme_option('featured_items_title', 'Featured items');
$featuredCollectionsTitle = neptunclassic_theme_option('featured_collections_title', 'Curated sets');
$featuredCount = (int) neptunclassic_theme_option('featured_items_count', 6);
if ($featuredCount < 1) $featuredCount = 6;
$collectionCount = (int) neptunclassic_theme_option('featured_collections_count', 4);
if ($collectionCount < 1) $collectionCount = 4;
$featuredItems = get_records('Item', array('featured' => true), $featuredCount);
if (!$featuredItems) {
    $featuredItems = get_records('Item', array('sort_field' => 'added', 'sort_dir' => 'd'), $featuredCount);
}
$featuredCollections = get_records('Collection', array('featured' => true), $collectionCount);
if (!$featuredCollections) {
    $featuredCollections = get_records('Collection', array(), $collectionCount);
}
?>
<section class="hero hero-home">
    <div class="container hero-grid">
        <div class="hero-copy">
            <span class="hero-badge"><?php echo html_escape($badge); ?></span>
            <h1><?php echo html_escape($title); ?></h1>
            <p class="hero-lead"><?php echo nl2br(html_escape($text)); ?></p>

            <?php if (get_theme_option('show_home_search')): ?>
                <form class="search-shell" role="search" action="<?php echo html_escape(url('items/browse')); ?>" method="get">
                    <label class="screen-reader-text" for="neptun-search">Search archive</label>
                    <input id="neptun-search" type="search" name="search" placeholder="<?php echo html_escape($placeholder); ?>">
                    <button type="submit">Search</button>
                </form>
            <?php endif; ?>

            <div class="hero-actions">
                <a class="button-primary" href="<?php echo html_escape(url('items/browse')); ?>">Browse Items</a>
                <a class="button-ghost" href="<?php echo html_escape(url('collections/browse')); ?>">Explore Collections</a>
            </div>
        </div>

        <div class="hero-panel">
            <img src="<?php echo html_escape($heroImage); ?>" alt="Archive preview">
        </div>
    </div>
</section>

<section class="section-wrap">
    <div class="container section-head">
        <div>
            <p class="section-kicker">Highlights</p>
            <h2><?php echo html_escape($featuredItemsTitle); ?></h2>
        </div>
        <a class="text-link" href="<?php echo html_escape(url('items/browse')); ?>">View all items</a>
    </div>
    <div class="container card-grid">
        <?php foreach ($featuredItems as $item): ?>
            <article class="record-card">
                <a class="record-thumb" href="<?php echo html_escape(record_url($item)); ?>">
                    <?php echo neptunclassic_record_thumb($item); ?>
                </a>
                <div class="record-body">
                    <p class="record-type">Item</p>
                    <h3><a href="<?php echo html_escape(record_url($item)); ?>"><?php echo metadata($item, array('Dublin Core', 'Title')); ?></a></h3>
                    <p><?php echo html_escape(neptunclassic_excerpt(metadata($item, array('Dublin Core', 'Description')), 22)); ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php if (get_theme_option('show_collection_panel')): ?>
<section class="section-wrap section-soft">
    <div class="container section-head">
        <div>
            <p class="section-kicker">Collections</p>
            <h2><?php echo html_escape($featuredCollectionsTitle); ?></h2>
        </div>
        <a class="text-link" href="<?php echo html_escape(url('collections/browse')); ?>">Browse collections</a>
    </div>
    <div class="container card-grid card-grid-collections">
        <?php foreach ($featuredCollections as $collection): ?>
            <article class="record-card collection-card">
                <a class="record-thumb" href="<?php echo html_escape(record_url($collection)); ?>">
                    <?php echo neptunclassic_record_thumb($collection); ?>
                </a>
                <div class="record-body">
                    <p class="record-type">Collection</p>
                    <h3><a href="<?php echo html_escape(record_url($collection)); ?>"><?php echo metadata($collection, array('Dublin Core', 'Title')); ?></a></h3>
                    <p><?php echo html_escape(neptunclassic_excerpt(metadata($collection, array('Dublin Core', 'Description')), 20)); ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<section class="section-wrap">
    <div class="container info-band">
        <div class="info-box">
            <h3>IIIF ready</h3>
            <p>Add a IIIF manifest URL to <strong>Dublin Core → Identifier</strong> or <strong>Relation</strong> and the item page will auto-load a Universal Viewer iframe.</p>
        </div>
        <div class="info-box">
            <h3>Research friendly</h3>
            <p>The layout keeps the viewer, metadata, description, and citation area visible in a clean archival reading experience.</p>
        </div>
        <div class="info-box">
            <h3>Plugin compatible</h3>
            <p>Works well with Foundation as a base and pairs naturally with Simple Pages, Exhibit Builder, Universal Viewer, and IIIF Toolkit.</p>
        </div>
    </div>
</section>

<?php echo foot(); ?>
