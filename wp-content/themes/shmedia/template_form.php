<?php
/*
 * Template Name: Form
 *
 *
*/
get_header();
global $post;
global $cfs;
$id = $post->ID; ?>
<section  class="form right60">
    <div class="one bord">
        <div class="bordCol"></div>
        <?php
        if($cfs->get('one_column', $id )) {
            $missionT = $cfs->get('one_column', $id);
            echo $missionT;
        }
        ?>
    </div>
    <div class="two bord">
        <div class="bordCol"></div>
        <?php
        if($cfs->get('two_column', $id )) {
            $missionT = $cfs->get('two_column', $id);
            echo $missionT;
        }
        ?>
    </div>
    <div class="three bord ">
        <div class="bordCol"></div>
        <?php
        if($cfs->get('three_column', $id )) {
            $missionT = $cfs->get('three_column', $id);
            echo $missionT;
        }
        ?>
    </div>
    <div class="four">
        <?php
        if($cfs->get('four_column', $id )) {
            $missionT = $cfs->get('four_column', $id);
            echo $missionT;
        }
        ?>
    </div>
    <div class="formContent aboutRight">
        <h2 class="bordBot">
            <?php
            if($cfs->get('form_title', $id )) {
                $missionT = $cfs->get('form_title', $id);
                echo $missionT;
            }
            ?>
        </h2>
        <p>
            <?php
            if($cfs->get('form_text', $id )) {
                $missionT = $cfs->get('form_text', $id);
                echo $missionT;
            }
            ?>
        </p>
        <?php
        $content_post = get_post($id);
        $content = $content_post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        echo $content; ?>
    </div>
    <div class="clear"></div>
</section>










<?php get_footer(); ?>