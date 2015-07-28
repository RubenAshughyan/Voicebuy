<?php
 /*
  * Template Name: About Us
  *
  *
*/
get_header();
global $post;
global $cfs;
$id = $post->ID; ?>
<section class="AboutTop">
    <?php
    if($cfs->get('top_image', $id )) {
        $img = $cfs->get('top_image', $id);
        echo '<img src="' . $img . '" alt="signIn">';
    }
    ?>
<!--    <div class="aboutRightTop">-->
<!--        <div>-->
<!--            <a class="one" target="_blank" rel="nofollow" href="https://www.voicebuy.com/wholesale/subscribe.php" onclick="recordOutboundLink(this, 'outbound', 'sign_up');return false;">Sign up for FREE</a>-->
<!--        </div>-->
<!--        <div>-->
<!--            <a class="two" rel="nofollow" href="#" onclick="return false;">Check out our routings plan</a>-->
<!--        </div>-->
<!--    </div>-->
</section>
<section class="AboutContent right60">
    <div class="history">
        <div class="aboutTop">
            <h2>History</h2>
            <div class="line"></div>
            <div class="clear"></div>
        </div>
        <?php
        if($cfs->get('history', $id )) {
            $history = $cfs->get('history', $id);
            echo '<p>'.$history.'</p>';
        }?>
    </div>
    <div class="mission">
        <div class="aboutTop">
            <h2>Mission</h2>
            <div class="line"></div>
            <div class="clear"></div>
        </div>
        <?php
        if($cfs->get('mission_title', $id )) {
        $missionT = $cfs->get('mission_title', $id);
        echo '<h3>'.$missionT.'</h3>';
        }
        if($cfs->get('mission', $id )) {
            $mission = $cfs->get('mission', $id);
            echo '<p>'.$mission.'</p>';
        }?>
    </div>
    <div class="middleText">
        <?php
        if($cfs->get('about_us_text', $id )) {
            $about_us = $cfs->get('about_us_text', $id);
            echo '<p>'.$about_us.'</p>';
        }?>
    </div>
    <div class="clear"></div>
</section>
<section class="AboutTeam right60">
    <h2>Our Team</h2>
    <?php
    if($cfs->get('our_team', $id )) {
        $pages = $cfs->get('our_team', $id);
        $type = '';
        foreach ($pages as $ids) {
            $content_post = get_post($ids);
            $content = $content_post->post_content;
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
            $type .= '<div class="teamPerson">';
            $type .= '<div class="personTop">';
            $type .= '<a href="'.get_the_permalink($ids).'">';
            $type .= '<h4>'.get_the_title($ids).'</h4>';
            $type .= '<p>'.$cfs->get('profession', $ids).'</p>';
            $type .= '<div class="clear"></div>';
            $type .= '</a>';
            $type .= '</div>';
            $type .= '<div class="personContent">';
            $type .= '<div class="personImage">';
            $type .= get_the_post_thumbnail($ids);
            $type .= '</div>';
            $type .= '<div class="personText">';
            $type .= $content;
            $type .= '</div>';
            $type .= '<div class="clear">';
            $type .= '</div>';
            $type .= '</div>';
            $type .= '<div class="personSocial">';
            $type .= '<ul>';
            if($cfs->get('social_links', $ids )) {
                $loop = $cfs->get('social_links', $ids);
                foreach($loop as $ins => $info)
                {
                    $type .= '<li>';
                    $type .= '<a href="'.$info['link'].'">';
                    $type .= '<span class="fa '.$info['icon_class'].'">';
                    $type .= '</span>';
                    $type .= '</a>';
                    $type .= '</li>';
                }
            }
            $type .= '</ul>';
            $type .= '</div>';
            $type .= '</div>';
        }
        echo $type;
    }
    ?>
    <div class="clear"></div>
</section>
<?php get_footer(); ?>