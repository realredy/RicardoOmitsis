<?php
/**
 * Content template for a generic singular post
 *
 * @package Omitsis_Challenge
 */

if ( apply_filters( 'omitsis_challenge_display_singular_title', true ) ) : ?>
	<h1><?php the_title(); ?></h1>
<?php endif; ?>

<?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'full' ); ?>

<?php the_content(); ?>
