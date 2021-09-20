<?php
get_header();
?>
<section>
  <h2 class="txt_center">教材一覧</h2>
  <ul class="bl_cardList mt_30 col_2">
    <?php while ( have_posts() ) : the_post();?>
      <li>
        <a href="<?php the_permalink(); ?>">
        <div class="card">
          <div class="row no-gutters">
            <div class="col-md-4">
              <?php the_post_thumbnail('medium', ['class' => 'bd-placeholder-img', 'width' => '100%', 'height' => '100%']); ?>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text"><?php the_excerpt(); ?></p>
                <p class="card-text"><small class="text-muted"><?php echo get_the_date('Y年n月j日(l)更新'); ?></small></p>
              </div>
            </div>
          </div>
        </div>
        </a>
      </li>
    <?php endwhile;?>
  </ul>
</section>

<?php
get_footer();
