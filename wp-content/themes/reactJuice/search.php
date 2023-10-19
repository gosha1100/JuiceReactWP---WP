<?php
get_header();

if ( have_posts() ) :
    ?>
    <h2><?php printf( __( 'Search Results for: %s', 'reactJuice' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
    <?php
    while ( have_posts() ) : the_post();
        ?>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div>
            <?php the_excerpt(); ?>
        </div>
        <?php
    endwhile;
else :
    echo '<p>No results found for your search.</p>';
endif;

get_footer();
?>
