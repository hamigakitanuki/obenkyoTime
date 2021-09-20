<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>

	<!-- bootstrap 読み込み -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

	<!-- カスタムCSS読み込み -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/custom.css">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- 記事ページ以外はpaddingあり -->
<div id="page" class="site
	<?php if(!is_single()) echo 'isNotSingle'; ?>
">

		<header id="masthead" class="<?php echo is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">

			<div class="site-branding-container">
				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
			</div><!-- .site-branding-container -->

			<?php
				// 記事のカテゴリー情報を取得する
				$cat = get_the_category();
				// 取得した配列から必要な情報を変数に入れる
				$cat_slug  = $cat[0]->category_nicename ?? ''; // カテゴリースラッグ
			?>

			<?php
				if($cat_slug != 'question' || !is_single()):
			?>
				<!-- ナビゲーションヘッダー -->
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="container-fluid">
						<!-- ロゴ -->
						<a class="navbar-brand" href="<?php echo home_url( '/' ) ?>">お勉強タイム</a>
						<!-- ハンバーガーメニュー -->
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<!-- ログインしているユーザーのみメニュー表示 -->
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">
								<?php if (is_user_logged_in()):?>
									<li class="nav-item">
										<a class="nav-link active" aria-current="page" href="<?php echo home_url( '/' ) ?>home">ホーム</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?php echo home_url( '/' ) ?>textbook">教材一覧</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" href="<?php echo home_url( '/' ) ?>question">問題一覧</a>
									</li>
								<?php endif;?>
							</ul>
							<!-- ログインプルダウン -->
							<div>
								<?php if (!is_user_logged_in()): ?>
									<a href="<?php echo home_url( '/' ) ?>login">ログイン</a>
								<?php else: ?>
									<div class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											<?php echo do_shortcode('[wpmem_field user_login]'); ?>さん
										</a>
										<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
											<li><a class="dropdown-item" href="<?php echo home_url( '/' ) ?>profile">マイページ</a></li>
											<li><a class="dropdown-item" href="#">実績</a></li>
											<li><hr class="dropdown-divider"></li>
											<li><a class="dropdown-item" href="<?php echo home_url( '/' ) ?>logout/?a=logout">ログアウト</a></li>
										</ul>
									</div>
								<?php endif;?>
							</div>
						</div>
					</div>
				</nav>
			<?php endif; ?>

			<!-- 記事のヘッダー -->
			<?php if ( is_singular() && twentynineteen_can_show_post_thumbnail() ) : ?>
				<div class="site-featured-image">
					<?php
						twentynineteen_post_thumbnail();
						the_post();
						$discussion = ! is_page() && twentynineteen_can_show_post_thumbnail() ? twentynineteen_get_discussion_data() : null;

						$classes = 'entry-header';
					if ( ! empty( $discussion ) && absint( $discussion->responses ) > 0 ) {
						$classes = 'entry-header has-discussion';
					}
					?>
					<div class="<?php echo $classes; ?>">
						<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
					</div><!-- .entry-header -->
					<?php rewind_posts(); ?>
				</div>
			<?php endif; ?>
		</header><!-- #masthead -->

	<div id="content" class="site-content">
