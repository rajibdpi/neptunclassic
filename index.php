<?php echo head(array('bodyclass' => 'home')); ?>
<?php
$badge = neptunclassic_theme_option('hero_badge', 'Digital Archive');
$title = neptunclassic_theme_option('hero_title', option('site_title'));
$text  = neptunclassic_theme_option('hero_text', option('description'));
$placeholder = neptunclassic_theme_option('search_placeholder', 'Search the archive');
$featuredCount = (int) neptunclassic_theme_option('featured_items_count', 6);
if ($featuredCount < 1) {
    $featuredCount = 6;
}
$collectionCount = (int) neptunclassic_theme_option('featured_collections_count', 4);
if ($collectionCount < 1) {
    $collectionCount = 4;
}

$featuredItems = get_records('Item', array('featured' => true), $featuredCount);
if (!$featuredItems) {
    $featuredItems = get_records('Item', array('sort_field' => 'added', 'sort_dir' => 'd'), $featuredCount);
}

$featuredCollections = get_records('Collection', array('featured' => true), $collectionCount);
if (!$featuredCollections) {
    $featuredCollections = get_records('Collection', array(), $collectionCount);
}

$spotlightItem = $featuredItems ? reset($featuredItems) : null;
$secondaryItems = $featuredItems ? array_slice($featuredItems, 1, 3) : array();
$documentTypes = neptunclassic_document_types();
$itemTotal = neptunclassic_total_records('Item');
$collectionTotal = neptunclassic_total_records('Collection');
?>

<section class="home-intro">
    <div class="container home-intro-grid">
        <div class="home-copy">
            <p class="eyebrow"><?php echo html_escape($badge); ?></p>
            <h1><?php echo html_escape($title); ?></h1>
            <p class="lede"><?php echo nl2br(html_escape($text)); ?></p>

            <?php if (get_theme_option('show_home_search')): ?>
                <form class="search-shell search-shell-home" role="search" action="<?php echo html_escape(url('items/browse')); ?>" method="get">
                    <label class="screen-reader-text" for="neptun-search">Search archive</label>
                    <input id="neptun-search" type="search" name="search" placeholder="<?php echo html_escape($placeholder); ?>">
                    <button type="submit">Search</button>
                </form>
            <?php endif; ?>

            <div class="home-links">
                <a class="button-primary" href="<?php echo html_escape(url('items/browse')); ?>">Browse items</a>
                <a class="button-link" href="<?php echo html_escape(url('collections/browse')); ?>">Browse collections</a>
            </div>

            <dl class="home-stats" aria-label="Archive statistics">
                <div>
                    <dt>Items</dt>
                    <dd><?php echo number_format($itemTotal); ?></dd>
                </div>
                <div>
                    <dt>Collections</dt>
                    <dd><?php echo number_format($collectionTotal); ?></dd>
                </div>
                <div>
                    <dt>Pages</dt>
                    <dd>Research ready</dd>
                </div>
            </dl>
        </div>

        <aside class="home-spotlight">
            <div class="spotlight-frame">
                <?php if ($spotlightItem): ?>
                    <a class="spotlight-image" href="<?php echo html_escape(record_url($spotlightItem)); ?>">
                        <?php echo neptunclassic_record_thumb($spotlightItem, 'fullsize'); ?>
                    </a>
                    <div class="spotlight-body">
                        <p class="eyebrow">Featured record</p>
                        <h2><a href="<?php echo html_escape(record_url($spotlightItem)); ?>"><?php echo metadata($spotlightItem, array('Dublin Core', 'Title')); ?></a></h2>
                        <p><?php echo html_escape(neptunclassic_excerpt(metadata($spotlightItem, array('Dublin Core', 'Description')), 34)); ?></p>
                    </div>
                <?php else: ?>
                    <div class="spotlight-image spotlight-placeholder">
                        <img src="<?php echo html_escape(img('hero.jpg')); ?>" alt="Archive preview">
                    </div>
                    <div class="spotlight-body">
                        <p class="eyebrow">Archive highlight</p>
                        <h2>Curated material for research and teaching</h2>
                        <p>Use the archive to navigate manuscripts, reports, photographs, and exhibition records through a clear scholarly interface.</p>
                    </div>
                <?php endif; ?>
            </div>
        </aside>
    </div>
</section>

<?php if ($secondaryItems): ?>
<section class="section-wrap home-feature-strip">
    <div class="container section-head editorial-head">
        <div>
            <p class="section-kicker">In focus</p>
            <h2>Current highlights</h2>
        </div>
        <a class="text-link" href="<?php echo html_escape(url('items/browse')); ?>">All records</a>
    </div>
    <div class="container feature-list">
        <?php foreach ($secondaryItems as $item): ?>
            <article class="feature-entry">
                <div class="feature-entry-copy">
                    <p class="record-type">Item</p>
                    <h3><a href="<?php echo html_escape(record_url($item)); ?>"><?php echo metadata($item, array('Dublin Core', 'Title')); ?></a></h3>
                    <p><?php echo html_escape(neptunclassic_excerpt(metadata($item, array('Dublin Core', 'Description')), 18)); ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<section class="section-wrap document-section">
    <div class="container section-head editorial-head">
        <div>
            <p class="section-kicker">Explore</p>
            <h2>Document types</h2>
        </div>
        <p class="section-note">An editorial entry point modeled on the NEPTUN homepage structure.</p>
    </div>
    <div class="container document-grid">
        <?php foreach ($documentTypes as $documentType): ?>
            <a class="document-card" href="<?php echo html_escape($documentType['href']); ?>">
                <span class="document-card-index"></span>
                <h3><?php echo html_escape($documentType['label']); ?></h3>
                <p><?php echo html_escape($documentType['description']); ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<?php if ($featuredCollections): ?>
<section class="section-wrap collections-band">
    <div class="container section-head editorial-head">
        <div>
            <p class="section-kicker">Collections</p>
            <h2>Featured fonds and dossiers</h2>
        </div>
        <a class="text-link" href="<?php echo html_escape(url('collections/browse')); ?>">Browse collections</a>
    </div>
    <div class="container collection-ribbon">
        <?php foreach ($featuredCollections as $collection): ?>
            <article class="collection-panel">
                <a class="collection-panel-media" href="<?php echo html_escape(record_url($collection)); ?>">
                    <?php echo neptunclassic_record_thumb($collection, 'fullsize'); ?>
                </a>
                <div class="collection-panel-copy">
                    <p class="record-type">Collection</p>
                    <h3><a href="<?php echo html_escape(record_url($collection)); ?>"><?php echo metadata($collection, array('Dublin Core', 'Title')); ?></a></h3>
                    <p><?php echo html_escape(neptunclassic_excerpt(metadata($collection, array('Dublin Core', 'Description')), 16)); ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<section class="section-wrap section-soft note-section">
    <div class="container note-grid">
        <div class="note-card">
            <p class="section-kicker">Viewer</p>
            <h3>IIIF manifests open directly in the item page</h3>
            <p>Add a manifest URL to <strong>Dublin Core → Identifier</strong> or <strong>Relation</strong> and the theme loads Universal Viewer automatically.</p>
        </div>
        <div class="note-card">
            <p class="section-kicker">Use</p>
            <h3>Designed for archival reading</h3>
            <p>The interface keeps navigation, metadata, description, and image access in a restrained academic layout.</p>
        </div>
    </div>
</section>

<?php echo foot(); ?>
