<?php get_header('home'); ?>
	
	<main id="main" class="container">
		
		<ul class="gallery">
			

		<?php  

			$args = array(
				'post_type' => 'galeria',
				'post_status' => 'publish',
			);

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) : 
				while( $query->have_posts() ) : $query->the_post();
		?>

			<li class="gallery__single">
				<a href="<?php the_permalink() ?>" rel="<?php the_ID(); ?>" class="gallery__link">

				<?php echo custom_data_srcset_thumbnail(get_the_ID()); ?>

					<div class="gallery__overlay">
						<p class="gallery__description"><?php the_field('opis'); ?></p>

					</div>
					 
				</a>
			</li>

		<?php 
			endwhile;
			endif;

			wp_reset_postdata();
		?>

		</ul>
		
	</main>

<?php get_footer(); ?>  