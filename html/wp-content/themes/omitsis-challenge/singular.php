<?php
/**
 * The main template file for single posts
 *
 * @package Omitsis_Challenge
 */

get_header();
?>

	<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content-singular', get_post_type() );
			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main>

<?php
get_footer();
