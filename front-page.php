<?php

get_header();

$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1 // Display all posts
);
$posts = new WP_Query($args);
if ($posts->have_posts()) :
?>
    <div class="grid-container">
        <?php while ($posts->have_posts()) : $posts->the_post(); ?>
            <div class="grid-item">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="post-excerpt">
                    <?php the_excerpt(); ?>
                </div>
                <button class="like-button" data-post-id="<?php echo get_the_ID(); ?>">Like</button>
                <span class="like-count" data-post-id="<?php echo get_the_ID(); ?>"><?php echo get_post_meta(get_the_ID(), 'like_count', true); ?></span>
            </div>
        <?php endwhile; ?>
    </div>
<?php
endif;
wp_reset_postdata();

get_footer();

?>

