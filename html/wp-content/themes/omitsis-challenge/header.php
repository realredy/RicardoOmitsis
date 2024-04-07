<?php
/**
 * The header for our theme
 *
 * @package Omitsis_Challenge
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<?php
	get_template_part(
		'template-parts/site-header',
		apply_filters( 'omitsis_challenge_header_style', '' )
	);
	?>
