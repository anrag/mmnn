<?php global $smof_data; ?>
<?php if ($smof_data['footer_top_widgets']): ?>
    <footer id="footer-top">
        <div class="container">
            <div class="row">
                <div class="footer-top">
                    <?php cshero_sidebar_footer_top(); ?>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>
<?php if ($smof_data['footer_bottom_widgets']): ?>
<footer id="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="footer-bottom">
                <?php cshero_sidebar_footer_bottom(); ?>
            </div>
        </div>
    </div>
</footer>
<?php endif; ?>
</div>
<?php echo $smof_data["space_body"]; ?>
<?php wp_footer(); ?>
</body>
</html>