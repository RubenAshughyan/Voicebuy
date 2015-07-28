<?php
/*
 * Template Name: Contact Us
 *
 *
*/
get_header();
global $post;
global $cfs;
$id = $post->ID; ?>

<section class="contact right60">
    <h2 class="bordBot"><?php echo get_the_title($id); ?></h2>
    <div class="aboutLeft">
        <div class="info">
            <div class="infoTop">
                <p><span class="fa fa-envelope-o"></span>Contact information</p>
            </div>
            <div class="twoInfo">
                <p>Voice Trader LLC</p>
                <?php
                if($cfs->get('voice_trader_llc', $id )) {
                    $missionT = $cfs->get('voice_trader_llc', $id);
                    echo '<div><p>'.$missionT.'</p></div>';
                }
                ?>
            </div>
            <div class="lastInfo">
                <p>E-mails</p>
                <?php
                if($cfs->get('e_mails', $id )) {
                    $missionT = $cfs->get('e_mails', $id);
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
    <div class="aboutRight">
        <?php
        $content_post = get_post($id);
        $content = $content_post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        echo $content; ?>
        <div id="map"></div>
    </div>
    <div class="clear"></div>
</section>




<?php get_footer(); ?>