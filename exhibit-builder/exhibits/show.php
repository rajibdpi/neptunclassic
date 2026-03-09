<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'
));
?>

<section class="section-wrap">
    <div class="container simple-page-shell">
        <article class="detail-card simple-page-card">
            <header class="simple-page-header">
                <p class="hero-badge">Exhibit</p>
                <h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></span></h1>
            </header>

            <div class="prose simple-page-content">
                <div id="exhibit-blocks">
                    <?php exhibit_builder_render_exhibit_page(); ?>
                </div>

                <div id="exhibit-page-navigation">
                    <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
                    <div id="exhibit-nav-prev">
                        <?php echo $prevLink; ?>
                    </div>
                    <?php endif; ?>
                    <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
                    <div id="exhibit-nav-next">
                        <?php echo $nextLink; ?>
                    </div>
                    <?php endif; ?>
                    <div id="exhibit-nav-up">
                        <?php echo exhibit_builder_page_trail(); ?>
                    </div>
                </div>

                <nav id="exhibit-pages">
                    <h4><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
                    <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
                </nav>
            </div>
        </article>
    </div>
</section>

<?php echo foot(); ?>
