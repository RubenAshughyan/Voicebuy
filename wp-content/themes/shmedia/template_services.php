<?php
/*
 * Template Name: Services
 *
 *
*/
get_header();
global $post;
global $cfs;
$id = $post->ID; ?>

<section class="services right60">
    <?php
    if($cfs->get('loop', $id )) {
        $pages = $cfs->get('loop', $id);
        $type = '';
        foreach ($pages as $im => $ins) {
            $type .= '<div class="bord">';
            $type .= '<div class="bordCol">'.$ins['box_title'].'</div>';
            $type .= '<p>'.$ins['box_content'].'</p>';
            if($ins['buttons']) {
                $pages2 = $ins['buttons'];
                foreach ($pages2 as $im2 => $ins2) {
                    $type .= '<div class="button">';
                    $type .= '<a href="'.$ins2['button_link'].'">'.$ins2['button_title'].'</a>';
                    $type .= '</div>';
                }
            }
            $type .= '<div class="clear"> </div>';
            $type .= '</div>';
        }
        echo $type;
    }
        if($cfs->get('last_block', $id )) {
            echo '<div class="lastSerBlock">';
            $txt = $cfs->get('last_block', $id);
            echo '<p><span class="fa '.$cfs->get('last_block_icon_class', $id).'"></span><span>'.$txt.'</span></p></div>';
        }
        ?>
</section>


<?php get_footer(); ?>