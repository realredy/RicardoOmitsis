<?php
/**
 * Site header
 *
 * @package Omitsis_Challenge
 */

?>
<header class="site-header">
	<a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>

	<nav>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu_class'     => 'primary-menu',
				'container'      => '',
				'fallback_cb'    => false,
			)
		);
		?>
	</nav>
</header>
