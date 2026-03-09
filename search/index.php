<?php echo head(array('title' => __('Search'), 'bodyclass' => 'search results')); ?>
<section class="hero browse-hero">
    <div class="container browse-hero-inner">
        <div>
            <p class="hero-badge">Search</p>
            <h1>Search the archive</h1>
            <p class="hero-lead">Use Omeka's advanced search on top of a modern visual shell.</p>
        </div>
        <div class="search-advanced-box">
            <?php echo search_form(array('show_advanced' => true)); ?>
        </div>
    </div>
</section>
<?php if (isset($results)): ?>
<section class="section-wrap">
    <div class="container">
        <?php echo search_filters(); ?>
        <?php echo pagination_links(); ?>
        <?php echo $results; ?>
    </div>
</section>
<?php endif; ?>
<?php echo foot(); ?>
