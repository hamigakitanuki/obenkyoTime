<!-- ログイン画面 -->
<?php get_header();?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php if (!is_user_logged_in()): ?>
                <section>
                    <?php echo do_shortcode('[wpmem_form login]'); ?>
                </section>
            <?php else: ?>
                <script>
                    window.addEventListener('DOMContentLoaded', () => {
                        setTimeout(() => {
                            location.href = '<?php echo home_url( '/home ' ) ?>'
                        }, 100);
                    })
                </script>
            <?php endif;?>
        </main>
    </div>
<?php get_footer();?>
