<?php
/**
 * Template part for one generic post
 *
 * @package Omitsis_Challenge
 */

?>
<article>
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php the_content(); ?>
</article>
