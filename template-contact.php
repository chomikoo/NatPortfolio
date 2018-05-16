<?php 
	/* Template Name: Contact */
	get_header();
?>

	<main class="container">
			
		<section class="contact">
			
			<a href="tel:<?php the_field('telefon'); ?>" class="contact__element">Telefon: <?php the_field('telefon'); ?></a>
			<a href="mailto:<?php the_field('email'); ?>" class="contact__element" >email: <?php the_field('email'); ?></a> 
			<a href="<?php the_field('instagram'); ?>" class="contact__element">Instagram</a>


		</section>



	</main>

<?php get_footer(); ?>