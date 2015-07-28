<?php get_header();
global $post;
global $cfs;
$id = $post->ID;?>
<section class="page right60">
    <h2 class=" bordBot"><?php echo get_the_title($id); ?></h2>
    <?php
    $content_post = get_post($id);
    $content = $content_post->post_content;
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    echo $content; ?>
</section>
<?php get_footer(); ?>