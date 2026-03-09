<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass' => 'exhibits summary')); ?>

<section class="section-wrap">
    <div class="container simple-page-shell">
        <article class="detail-card simple-page-card">
            <header class="simple-page-header">
                <p class="hero-badge">Exhibit</p>
                <h1><?php echo metadata('exhibit', 'title'); ?></h1>
            </header>

            <div class="prose simple-page-content">
                <?php echo exhibit_builder_page_nav(); ?>

                <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                <div class="exhibit-description">
                    <?php echo $exhibitDescription; ?>
                </div>
                <?php endif; ?>

                <?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
                <div class="exhibit-credits">
                    <h2><?php echo __('Credits'); ?></h2>
                    <p><?php echo $exhibitCredits; ?></p>
                </div>
                <?php endif; ?>

                <?php
                $pageTree = exhibit_builder_page_tree();
                if ($pageTree):
                ?>
                <nav id="exhibit-pages">
                    <?php echo $pageTree; ?>
                </nav>
                <?php endif; ?>
            </div>
        </article>
    </div>
</section>

<?php echo foot(); ?>
