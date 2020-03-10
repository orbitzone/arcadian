	<?php
	/**
	* @package Arcadian
	*/

	?>
	<!doctype html>
	<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>
		<style media="screen">
			.play-video.watched{
				background: red !important;
				content: 'watched' !important;
			}
		</style>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'arcadian' ); ?></a>

			<header class="header ">
				<div class="container-fluid">

					<nav class="navbar navbar-expand-lg">
						<a class="navbar-brand" href="/" title="Movify – Movies &amp; Cinema WordPress Theme">
							<img src="<?php bloginfo('template_url'); ?>/assets/dist/img/logo.png" alt="Movify – Movies &amp; Cinema WordPress Theme" class="logo" style="width: 150px;">
							<img src="<?php bloginfo('template_url'); ?>/assets/dist/img/logo-white.png" alt="Movify – Movies &amp; Cinema WordPress Theme" class="logo-white">
						</a>

						<button id="mobile-nav-toggler" class="hamburger hamburger--collapse" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>

						<div class="navbar-collapse" id="main-nav">
							<ul id="main-menu" class="navbar-nav mx-auto"><li class="nav-item dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Home</a>
								<ul class="dropdown-menu">
									<li class=" nav-item menu-item menu-item-type-custom menu-item-object-custom"><a class="nav-link" href="#">Home Version 1</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page"><a class="nav-link" href="#">Home Version 2</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page"><a class="nav-link" href="#">Home Version 3</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page"><a class="nav-link" href="#">Home Version 4</a></li>
								</ul>
							</li>
							<li class="nav-item dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Pages</a>
								<ul class="dropdown-menu">
									<li class=" nav-item menu-item menu-item-type-custom menu-item-object-custom"><a class="nav-link" href="#">404 Page</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page"><a class="nav-link" href="#">Contact Us</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page"><a class="nav-link" href="#">Coming Soon</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page"><a class="nav-link" href="#">Pricing Plan</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page"><a class="nav-link" href="#">Login – Register</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page"><a class="nav-link" href="#">Testimonials</a></li>
								</ul>
							</li>
							<li class="nav-item dropdown menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children"><a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Movies &amp; TV Shows</a>
								<ul class="dropdown-menu">
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page"><a class="nav-link" href="#">Movie List 1</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page"><a class="nav-link" href="#">Movie List 2</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page"><a class="nav-link" href="#">Movie Grid 1</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page"><a class="nav-link" href="#">Movie Grid 2</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-453 current_page_item"><a class="nav-link" href="#">Movie Grid 3</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page"><a class="nav-link" href="#">Movie Grid 4</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-movie"><a class="nav-link" href="#">Movie Detail</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-movie"><a class="nav-link" href="#">Movie Detail 2</a></li>
								</ul>
							</li>
							<li class="nav-item dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Blog</a>
								<ul class="dropdown-menu">
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page"><a class="nav-link" href="#">Blog List</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-post"><a class="nav-link" href="#">Post With Gallery</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-post"><a class="nav-link" href="#">Post With Vimeo</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-post"><a class="nav-link" href="#">Post With Youtube</a></li>
									<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-post"><a class="nav-link" href="#">Post With Audio</a></li>
								</ul>
							</li>
							<li class=" nav-item menu-item menu-item-type-post_type menu-item-object-page"><a class="nav-link" href="#">Contact Us</a></li>
						</ul>
						<ul class="navbar-nav extra-nav">

							<li class="nav-item">
								<a class="nav-link toggle-search" href="#">
									<i class="fa fa-search"></i>
								</a>
							</li>

							<li class="nav-item m-auto">
								<a href="#login-register-popup" class="btn btn-main btn-effect login-btn popup-with-zoom-anim">
								</i>login</a>
							</li>

						</ul>

					</div>
				</nav>

			</div>
		</header>

		<div id="content" class="site-content">
