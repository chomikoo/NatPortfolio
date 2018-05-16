<?php 
	/* Template Name: ABOUT */
 	get_header();	
?>

	<main class="container">
		
	<?php
		if (have_posts()):
		  while (have_posts()) : the_post();
		    
		  	get_template_part( 'template-parts/content', 'about' );

		  endwhile;
		else:
		  echo '<p>Sorry, no posts matched your criteria.</p>';
		endif;
	?>

	</main>


<?php get_footer(); ?>