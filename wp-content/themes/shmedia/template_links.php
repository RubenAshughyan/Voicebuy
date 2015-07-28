<?php
/*
 * Template Name: Links
 *
 *
*/
get_header();
global $post;
global $cfs;
$id = $post->ID; ?>

    <section class="glossary right60">
        <h2 class="bordBot">
            <?php echo get_the_title($id); ?>
        </h2>
        <ul class="links">
            <?php
            if($cfs->get('loop', $id)) {
                $pages = $cfs->get('loop', $id);
                $type = '';
                foreach ($pages as $im => $ins) {
                    $type .= '<li class="link">';
                    $type .= '<a href="'.$ins['link'].'">'.$ins['link_title'].'</a>';
                    $type .= '</li>';
                    $type .= '<li class="description">';
                    $type .= $ins['description'];
                    $type .= '</li>';
                }
                echo $type;
            }
            ?>
        </ul>
        <div class="rightLinks">
            <?php
            if($cfs->get('right_text', $id )) {
                $pages = $cfs->get('right_text', $id);
                echo $pages;
            }
            ?>
        </div>
        <div class="clear"></div>
    </section>


<?php get_footer(); ?>