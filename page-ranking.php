<!-- プロフィール画面 -->
<?php get_header();?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section>
                <h2 class="txt_center">ランキング一覧</h2>
                <ul class="bl_cardList mt_30 col_3">
                    <li>
                        <?php
                            $cat_posts = get_posts(array(
                            'category_name' => 'question', // カテゴリをスラッグで指定する場合
                            'orderby' => 'date', // 表示順の基準
                            'order' => 'DESC' // 昇順・降順
                        ));
                        global $post;
                        if($cat_posts): foreach($cat_posts as $key => $post): setup_postdata($post);
                        ?>
                        <div class="card">
                            <?php the_post_thumbnail('medium', ['class' => 'bd-placeholder-img card-img-top', 'width' => '100%', 'height' => '180']); ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php the_title(); ?></h5>
                                <?php echo do_shortcode("[qsm_leaderboard quiz=".($key+1)."]");?>
                            </div>
                        </div>
                        <?php endforeach; endif; wp_reset_postdata(); ?>
                    </li>
                </ul>
            </section>
        </main>
    </div>


<?php get_footer();?>
