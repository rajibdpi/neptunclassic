<?php
$fileTitle = metadata('file', 'display_title');

if ($fileTitle != '') {
    $fileTitle = ': &quot;' . $fileTitle . '&quot; ';
} else {
    $fileTitle = '';
}
$fileTitle = __('File #%s', metadata('file', 'id')) . $fileTitle;
?>
<?php echo head(['title' => $fileTitle, 'bodyclass' => 'files show primary-secondary']); ?>

<section class="section-wrap">
    <div class="container simple-page-shell">
        <article class="detail-card simple-page-card">
            <header class="simple-page-header">
                <p class="hero-badge">File</p>
                <h1><?php echo $fileTitle; ?></h1>
            </header>

            <div class="detail-grid">
                <div id="primary" class="prose simple-page-content">
                    <?php echo file_markup($file, ['imageSize' => 'fullsize']); ?>
                    <?php echo all_element_texts('file'); ?>
                </div>

                <aside id="sidebar">
                    <div id="item-metadata" class="info-box">
                        <h2><?php echo __('Item'); ?></h2>
                        <?php echo link_to_item(null, [], 'show', $file->getItem()); ?>
                    </div>

                    <div id="format-metadata" class="info-box">
                        <h2><?php echo __('Format Metadata'); ?></h2>
                        <div id="original-filename" class="element">
                            <h3><?php echo __('Original Filename'); ?></h3>
                            <div class="element-text"><?php echo metadata('file', 'Original Filename'); ?></div>
                        </div>

                        <div id="file-size" class="element">
                            <h3><?php echo __('File Size'); ?></h3>
                            <div class="element-text"><?php echo __('%s bytes', metadata('file', 'Size')); ?></div>
                        </div>

                        <div id="authentication" class="element">
                            <h3><?php echo __('Authentication'); ?></h3>
                            <div class="element-text"><?php echo metadata('file', 'Authentication'); ?></div>
                        </div>
                    </div>

                    <div id="type-metadata" class="info-box">
                        <h2><?php echo __('Type Metadata'); ?></h2>
                        <div id="mime-type-browser" class="element">
                            <h3><?php echo __('Mime Type'); ?></h3>
                            <div class="element-text"><?php echo metadata('file', 'MIME Type'); ?></div>
                        </div>
                        <div id="file-type-os" class="element">
                            <h3><?php echo __('File Type / OS'); ?></h3>
                            <div class="element-text"><?php echo metadata('file', 'Type OS'); ?></div>
                        </div>
                    </div>
                </aside>
            </div>
        </article>
    </div>
</section>

<?php echo foot();?>
