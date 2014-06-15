<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="We strive to increase NASA's funding to 1% by encouraging popular support for NASA through education and outreach.">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="icon shortcut" href="<?php echo get_template_directory_uri(); ?>/images/p4n-icon.ico">

		<title><?php wp_title( '|', true, 'right' ); ?></title>

		<link href="http://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet" type="text/css">
		<link href="/wp-content/themes/penny4nasa/style.css" rel="stylesheet" type="text/css">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(is_page() ? "page-{$post->post_name}" : ''); ?>>
		<div class="wrapper">
			<header class="site-header">
				<div class="container">
					<div class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php get_template_part( 'content', 'logo' ); ?>
							<div class="title">
								Penny<span>4</span>NASA
							</div>
						</a>
					</div>
					<nav class="site-navigation" role="navigation">
						<ul class="nav-menu">
							<li class="nav-menu--item">
								<a href="/mission">The Mission</a>
							</li>
							<li class="nav-menu--item">
								<a href="/about">About</a>
							</li>
							<li class="nav-menu--item">
								<a href="/blog">Blog</a>
							</li>
							<li class="nav-menu--item">
								<a href="/press">Press Room</a>
							</li>
							<li class="nav-menu--item">
								<a href="//www.cafepress.com/spaceadvocates">Store</a>
							</li>
							<li class="nav-menu--item">
								<a href="/donate">Donate</a>
							</li>
							<li class="nav-menu--item">
								<a href="/take-action">Take Action</a>
							</li>
						</ul>
					</nav>
				</div>
			</header><!-- #site-header -->

			<main class="site-main" role="main">
