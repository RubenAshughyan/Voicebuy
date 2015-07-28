<?php
/*
 * Template Name: Feedback
 *
 *
*/
get_header();
global $post;
global $cfs;
$id = $post->ID; ?>

    <section class="contact right60">
        <div class="feedTop">
            <?php
            if($cfs->get('top_text', $id )) {
                $missionT = $cfs->get('top_text', $id);
                echo '<div><p>'.$missionT.'</p></div>';
            }
            ?>
        </div>
        <div class="aboutRight">
            <?php
            $content_post = get_post($id);
            $content = $content_post->post_content;
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
            echo $content; ?>
        </div>
        <div class="aboutLeft">
            <div class="info">
                <div class="infoTop">
                    <p><span class="fa fa-envelope-o"></span>Additional information</p>
                </div>
                <div class="twoInfo">
                    <p>Contacts</p>
                    <?php
                    if($cfs->get('contacts', $id )) {
                        $missionT = $cfs->get('contacts', $id);
                        echo '<div><p>'.$missionT.'</p></div>';
                    }
                    ?>
                </div>
                <div class="lastInfo">
                    <p>Business Hours</p>
                    <?php
                    if($cfs->get('business_hours', $id )) {
                        $missionT = $cfs->get('business_hours', $id);
                        echo '<div><p>'.$missionT.'</p></div>';
                    }
                    ?>
                </div>
            </div>
            <div class="bottomTextInfo">
                <?php
                if($cfs->get('bottom_text', $id )) {
                    $bottom_text = $cfs->get('bottom_text', $id);
                    echo '<div><p>'.$bottom_text.'</p></div>';
                }
                ?>
            </div>
        </div>
        <div class="clear"></div>
    </section>




<?php get_footer(); ?>