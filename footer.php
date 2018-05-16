		<footer class="footer container">

			<div class="copy">

				<a href="www.szymontrzepla.pl" target="_blank" class="copy__author">Design&Coded by Chomikoo</a>
				<span class="copy__date">&#169; <?php echo date('Y'); ?></span>

			</div>

			<div id="post-modal" class="modal">
				<button id="close-modal" class="close-modal">&times;</button>
				<div id="modal__content" class="modal__content">
			</div>
		</footer>
		<?php wp_footer(); ?>

	
		<script type="text/javascript" src="<?php echo theme_URL; ?>/src/js/vendors/lazysizes.js"></script>

		<script type="text/javascript" src="<?php echo theme_URL; ?>/src/js/vendors/slick.js"></script>

		<script type="text/javascript" src="<?php echo theme_URL; ?>/src/js/script.js"></script>

        <script>
        (function() {
        var link = document.createElement('link');
        link.rel = "stylesheet";
        link.href = "https://fonts.googleapis.com/css?family=Open+Sans|Raleway&amp;subset=latin-ext";
        document.querySelector("head").appendChild(link);
        })();
        </script>
	</body>
</html>