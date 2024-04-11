<?php

/**
 * Template part for one generic post
 *
 * @package Omitsis_Challenge
 */

?>
<article class="archive-posts-card">
    <div class="sarchive-posts-card-inner">
        <h2 class="sarchive-posts-card-inner-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
    </div>
    <div class="sarchive-posts-card-inner-image">
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail();
        }
        ?>
    </div>
    <div class="sarchive-posts-card-inner-exerpt">
        <?php
        the_excerpt();
        ?>
    </div>
    <div class="sarchive-posts-card-inner-call-to-action">
        <a href="<?php the_permalink(); ?>"><?php echo _('Read More') ?></a>
    </div>

</article>