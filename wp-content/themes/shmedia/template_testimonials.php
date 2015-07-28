<?php
/*
 * Template Name: Testimonials
 *
 *
*/
get_header();
global $post;
global $cfs;
$postID = $post->ID;?>

<section class="testimonials right60">
    <h2 class=" bordBot"><?php echo get_the_title($postID); ?></h2>
    <?php

    $args = array(
        'post_type'        =>'testimonials',
        'order'            =>'DESC',
        'suppress_filters' => 0
    );

    $posts = get_posts( $args );
    foreach ( $posts as $post ) {
        $ID_r = $post->ID;
        $content_post = get_post($ID_r);
        $content = $content_post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        $cont = '';
        $cont .= '<div class="testimonial">';
            $cont .= '<div class="testTop">';
                $cont .= $content;
            $cont .= '</div>';
            $cont .= '<div class="testBottom">';
                $cont .= ''.get_the_title($ID_r);
            $cont .= '</div>';
        $cont .= '</div>';
        echo $cont;
    }
    ?>
    <div class="clear"></div>
</section>

<?php get_footer(); ?>