<?php
/**
 * Template part for displaying adventure posts on the home page.
 *
 * @package RED_Starter_Theme
 */

?>

<?php if (get_post_type() != 'adventure' && get_post_type() != 'journal') : ?>

    <?php
    $categories = get_terms('productcategory');
    $cat_count = 1;
    if (!empty($categories)){
        foreach ($categories as $cat) {
            // print_r($cat);
            echo '<article id="post-'. get_the_ID(). '" class="small-12 medium-4 large-3 '.(($cat_count == 4)? "hide-for-medium-only" : "").' columns shop-cats '. get_post_class().'">';
            echo '<div class="grey-border flex">'; // add a class and closing div
            echo "<img src='".get_bloginfo('stylesheet_directory')."/images/product-type-icons/".$cat->slug.".svg'>";
            echo "<p class='product-description center-text'>". $cat->description. "</p>";
            $link = get_term_link($cat->term_id);
            echo '<div class="read-article">';
            echo "<a href='". $link. "' class='green-button button'>". $cat->slug. " Stuff</a>";
            echo '</div>';
            echo '</div>';
            echo "</article>";
            $cat_count ++;
        }
    }

    ?>
    </article><!-- #post-## -->
<?php endif; ?>


<?php if ( get_post_type() == 'journal' ) : ?>
    <header class="entry-header">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'rectangle-thumb' ); ?>

            <?php else : ?>
            <img src="<?php echo get_bloginfo('template_url') ?>/images/no_image_available.jpg">
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-meta grey-border">
        <?php red_starter_posted_on(); ?> <?php if (get_comments_number() != 0){ echo "/ "; comments_number( '0 Comments', '1 Comment', '% Comments' ); } ?>

        <?php echo ( get_the_title() ? the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ) : "<a href=".get_permalink()." rel='bookmark'><h3>No title available</h3></a>"); ?>

        <a href="<?php the_permalink(); ?>" class="black-button button">Read entry</a>

    </div><!-- .entry-meta -->
<?php endif; ?>

