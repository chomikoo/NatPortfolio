<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110577987-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-110577987-1');
	</script>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); ?>

	<title><?php bloginfo('name'); ?></title>


	<link rel="shortcut icon" href="<?php echo theme_URL; ?>img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="main.min.css">

</head>

<body <?php body_class(); ?>>
	
	<header id="header" class="header">

		<div class="navbar">

			<div class="container navbar__container">
				
				<p class="navbar__logo">Natalia<span class="red">Zięba</span></p>


				<nav class="navbar__nav">
					
					<?php 
					wp_nav_menu( 
						array( 
						'theme_location' => 'header-menu',
						'container' => ul,
						'menu_class' => 'navbar__list'
						 ) ); 
					?>


				</nav>

	        	<button id="hamburger" class="navbar__button hamburger" aria-label="Navigation menu">
	                <span></span>
	                <span></span>
	                <span></span>
				</button>

			</div>

		</div>




	</header>

