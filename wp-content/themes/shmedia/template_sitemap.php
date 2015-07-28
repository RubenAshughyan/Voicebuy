<?php
/*
 * Template Name: SiteMap
 *
 *
*/
get_header();
global $post;
global $cfs;
$id = $post->ID; ?>
<section class="sitemap right60">
    <h2 class=" bordBot"><?php echo get_the_title($id); ?></h2>
    <?php $args = array(
        'sort_order' => 'asc',
        'sort_column' => 'post_title',
        'hierarchical' => 1,
        'exclude' => '',
        'include' => '',
        'meta_key' => '',
        'meta_value' => '',
        'authors' => '',
        'child_of' => 0,
        'parent' => -1,
        'exclude_tree' => '',
        'number' => '',
        'offset' => 0,
        'post_type' => 'page',
        'post_status' => 'publish'
    );
    $pages = get_pages($args);
    foreach ($pages as $page) {
        if($page->post_parent != 0)
            echo '<h4 style="padding-left: 15px"><span class="fa fa-check"></span><a href="'.$page->guid.'">'.$page->post_title.'</a></h4>';
        else
            echo '<h4><span class="fa fa-check"></span><a href="'.$page->guid.'">'.$page->post_title.'</a></h4>';
    }

    ?>
</section>

<?php get_footer(); ?>