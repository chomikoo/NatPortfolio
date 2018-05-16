<?php 
	/* Template Name: Single Post */

 	get_header();

?>
	<main class="">
		<article id="gallery" class="gallery-<?php the_ID(); ?>">

		<?php 

			$galeria = get_field('gallery');

			if( $galeria ): ?>
				<div class="photo-box">
				    <ul class="photo-box__list">
				        <?php foreach( $galeria as $image ): ?>
				
				            <li>
				          
		                     	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				           
				            </li>
				        <?php endforeach; ?>
				    </ul>

				</div>
			<?php endif; ?>

		</article>
	</main>

<?php get_footer(); ?>  