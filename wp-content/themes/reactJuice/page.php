<?php
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        ?>
        <div>
            <?php the_content(); ?>
        </div>
        <?php
    endwhile;
else :
    echo '<p>No page found.</p>';
endif;

get_footer();
?>
