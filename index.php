<?php get_header(); ?>
	
	<main>
		
		<ul class="works">
			
fr
		<?php  

			$args = array(
				'post_type' => 'galeria',
				'post_status' => 'publish',
			);

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) : 
				while( $query->have_posts() ) : $query->the_post();
		?>
			<li class="works_single">
				loop 1

			</li>

			<?php 
				endwhile;
				endif;

				wp_reset_postdata();
			?>

		</ul>
		
	</main>

<?php get_footer(); ?>  