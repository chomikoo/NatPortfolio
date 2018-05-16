<?php 
	/* Template Name: Single Post */

 	get_header():

?>
	<main>

	<?php 

		$galeria = get_field('gallery');

		if( $galeria ): ?>
		    <ul>
		        <?php foreach( $galeria as $image ): ?>
		            <li>
		                <a href="<?php echo $image['url']; ?>">
		                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
		                </a>
		            </li>
		        <?php endforeach; ?>
		    </ul>
		<?php endif; ?>

	?>
	</main>

<?php get_footer(); ?>  