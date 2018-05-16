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

	<style type="style" src="<?php echo theme_URL; ?>/style.css"></style>

</head>

<body <?php body_class(); ?>>
	
	<header id="header" class="header">

		<div id="hero" class="hero">
	
				<?php 

				$images = get_field('galeria_preloader');

				if($images) { ?>

					<div class="hero__carousel">
						
						<?php foreach ($images as $image) { ?>
							
							<div class="hero__slide" style="background-image: url('<?php echo $image['sizes']['large']; ?>')" > </div>

						<?php } ?>			

					</div>

				<?php } ?>

			<h1 class="page-title hero__logo">Natalia <span class="red">Zięba</span></h1>
			
		</div>

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

