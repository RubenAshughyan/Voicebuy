<?php
/*
 * Template Name: FAQ's
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
<!--        <div class="aboutRightTop">-->
<!--            <div>-->
<!--                <a class="one" target="_blank" rel="nofollow" href="https://www.voicebuy.com/wholesale/subscribe.php" onclick="recordOutboundLink(this, 'outbound', 'sign_up');return false;">Sign up for FREE</a>-->
<!--            </div>-->
<!--            <div>-->
<!--                <a class="two" rel="nofollow" href="#" onclick="return false;">Check out our routings plan</a>-->
<!--            </div>-->
<!--        </div>-->
    </section>
    <section class="faqsQu right60">
        <div class="tabs">
           <div class="tabTitles">
               <div class="tabTitle active" data-id="1"><p>General</p></div>
               <div class="tabTitle" data-id="2"><p>Commercial</p></div>
               <div class="tabTitle" data-id="3"><p>Technical</p></div>
               <div class="clear"></div>
           </div>
            <ul class="active" data-id="1">
            <?php
            if($cfs->get('general', $id )) {
                $loop = $cfs->get('general', $id);
                $type = '';
                foreach($loop as $ins => $info)
                {
                    $type .= '<li class="quest">';
                    $type .= $info['question'];
                    $type .= '</li>';
                    $type .= '<li class="answer">';
                    $type .= $info['answer'];
                    $type .= '</li>';
                }
                echo $type;
            }
            ?>
            </ul>
            <ul data-id="2">
                <?php
                if($cfs->get('commercial', $id )) {
                    $loop = $cfs->get('commercial', $id);
                    $type = '';
                    foreach($loop as $ins => $info)
                    {
                        $type .= '<li class="quest">';
                        $type .= $info['question'];
                        $type .= '</li>';
                        $type .= '<li class="answer">';
                        $type .= $info['answer'];
                        $type .= '</li>';
                    }
                    echo $type;
                }
                ?>
            </ul>
            <ul data-id="3">
                <?php
                if($cfs->get('technical', $id )) {
                    $loop = $cfs->get('technical', $id);
                    $type = '';
                    foreach($loop as $ins => $info)
                    {
                        $type .= '<li class="quest">';
                        $type .= $info['question'];
                        $type .= '</li>';
                        $type .= '<li class="answer">';
                        $type .= $info['answer'];
                        $type .= '</li>';
                    }
                    echo $type;
                }
                ?>
            </ul>
        </div>
        <div class="popularQuestions">
            <div class="topicsHeader">
                <h2>Popular Topics</h2>
                <div class="line"></div>
                <div class="clear"></div>
            </div>
            <ul>
                <?php
                if($cfs->get('popular_topics', $id )) {
                    $loop = $cfs->get('popular_topics', $id);
                    $type = '';
                    foreach($loop as $ins => $info)
                    {
                        $type .= '<li class="ques">';
                        $type .= $info['question'];
                        $type .= '</li>';
                        $type .= '<li class="ans">';
                        $type .= $info['answer'];
                        $type .= '</li>';
                    }
                    echo $type;
                }
                ?>
            </ul>
        </div>
        <div class="clear"></div>
    </section>

    <section class="otherPages right60">
        <?php
        if($cfs->get('blue_boxes', $id )) {
            $loop = $cfs->get('blue_boxes', $id);
            $type = '';
            foreach($loop as $ins => $info)
            {
                $type .= '<div class="otherPage">';
                    $type .= '<a href="'.$info['link'].'">';
                        $type .= '<div class="iconBox">';
                            $type .= '<span class="fa '.$info['icon_class'].'"></span>';
                        $type .= '</div>';
                        $type .= '<div class="textBox">';
                            $type .= '<h4>'.$info['first_line'].'</h4>';
                            $type .= '<p>'.$info['second_line'].'</p>';
                            $type .= '<p>'.$info['last_line'].'</p>';
                        $type .= '</div>';
                        $type .= '<div class="clear"> </div>';
                    $type .= '</a>';
                $type .= '</div>';
            }
            echo $type;
        }
        ?>
        <div class="clear"></div>
    </section>
<?php get_footer(); ?>