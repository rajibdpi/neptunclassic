</main>
<?php $footerText = neptunclassic_theme_option('footer_text', 'Neptun Classic for Omeka Classic. IIIF-ready and research-friendly.'); ?>
<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <h2><?php echo html_escape(option('site_title')); ?></h2>
            <p><?php echo nl2br(html_escape($footerText)); ?></p>
        </div>
        <div>
            <p><strong>Theme:</strong> Neptun Classic</p>
            <p><strong>Platform:</strong> Omeka Classic</p>
            <p><strong>IIIF:</strong> Ready for manifest-based embedding</p>
        </div>
    </div>
</footer>
<?php fire_plugin_hook('public_footer', array('view' => $this)); ?>
</body>
</html>
