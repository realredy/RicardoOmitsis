<?php
/**
 * Template for the who we are page
 *
 * Template Name: Who We Are
 *
 * @package Omitsis_Challenge
 */

// This is a hardcoded array of data for your template
// and filter application. Adapt the output as you see fit.
$people = include __DIR__ . '/data/people.php';

$people = apply_filters( 'omitsis_challenge_people_list', $people );

get_header();
?>
<main class="site-main" id="main">

	<h1><?php esc_html_e( 'Omitsis’s People', 'omitsis-challenge' ); ?></h1>

	<table>
		<thead>
			<tr>
				<th><?php esc_html_e( 'Name', 'omitsis-challenge' ); ?></th>
				<th><?php esc_html_e( 'Position', 'omitsis-challenge' ); ?></th>
				<th><?php esc_html_e( 'Department', 'omitsis-challenge' ); ?></th>
			</tr>
		</thead>
		<tbody>

		<?php foreach ( $people as $p ) : ?>

			<tr>
				<td><?php echo esc_html( $p['name'] ); ?></td>
				<td><?php echo esc_html( $p['position'] ); ?></td>
				<td><?php echo esc_html( $p['dep'] ); ?></td>
			</tr>

		<?php endforeach; ?>

		</tbody>
	</table>
</main>

<?php
get_footer();
