<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php the_title( '<h1 class="page__title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="page__content">
		<?php
			the_content();

		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->