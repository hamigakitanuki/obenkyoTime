<!-- ホーム画面 -->
<?php get_header();?>
  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <section>
        <h2 class="txt_center">トップページ</h2>
        <ul class="bl_topMenu mt_30">
          <li>
            <a href="<?php echo home_url( '/' ) ?>textbook">
              <i class="fas fa-book"></i>
              <p>教材一覧</p>
            </a>
          </li>
          <li>
            <a href="<?php echo home_url( '/' ) ?>question">
              <i class="fas fa-pen-square"></i>
              <p>問題一覧</p>
            </a>
          </li>
          <li>
            <a href="<?php echo home_url( '/' ) ?>profile">
              <i class="fas fa-user-alt"></i>
              <p>プロフィール</p>
            </a>
          </li>
          <li>
            <a href="<?php echo home_url( '/' ) ?>">
              <i class="fas fa-star"></i>
              <p>実績</p>
            </a>
          </li>
          <li>
            <a href="<?php echo home_url( '/' ) ?>ranking">
              <i class="fas fa-crown"></i>
              <p>ランキング</p>
            </a>
          </li>
        </ul>
      </section>
    </main>
  </div>
<?php get_footer();?>
