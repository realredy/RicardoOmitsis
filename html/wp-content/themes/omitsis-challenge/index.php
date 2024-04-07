<?php
/**
 * The main template file
 *
 * @package Omitsis_Challenge
 */

get_header();
?>

	<main id="main" class="site-main">
		<div class="container">

			<?php
			if ( have_posts() ) :

				if ( apply_filters( 'omitsis_challenge_show_archive_title', true ) ) {
					?>
					<header class="page-header">
						<h1 class="page-title"><?php the_archive_title(); ?></h1>
					</header>
					<?php
				}

					do_action( 'omitsis_challenge_before_posts_loop' );
				?>

				<div class="archive-posts">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					?>

				</div>

				<?php
				do_action( 'omitsis_challenge_after_posts_loop' );
				?>

				<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		</div>

	</main>

<?php
get_footer();
