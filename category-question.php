<?php
get_header();
?>
<section>
  <h2 class="txt_center">問題一覧</h2>
  <ul class="bl_cardList mt_30 col_3">
    <?php while ( have_posts() ) : the_post();?>
      <li>
        <a href="<?php the_permalink(); ?>" target="_blank">
          <div class="card">
            <?php the_post_thumbnail('medium', ['class' => 'bd-placeholder-img card-img-top', 'width' => '100%', 'height' => '180']); ?>
            <div class="card-body">
              <h5 class="card-title"><?php the_title(); ?></h5>
              <p class="card-text"><?php echo get_the_date('Y年n月j日(l)更新'); ?></p>
            </div>
          </div>
        </a>
      </li>
    <?php endwhile;?>
  </ul>
</section>

<?php
get_footer();
