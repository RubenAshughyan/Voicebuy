<?php
/*
 * template name: Home
*/
get_header();?>

    <section class="slider">
        <?php echo do_shortcode('[rev_slider top-slider]'); ?>
    </section>
    <section class="servicesHome">
        <?php
            if($cfs->get('insert_pages', '5' )) {
                $pages = $cfs->get('insert_pages', '5');
                $type = '';
                foreach ($pages as $id) {
                    $type .= '<div class="service">';
                    $type .= '<a href="'.get_the_permalink($id).'">';
                    $type .= '<p>'.get_the_title($id).'</p>';
                    $type .= '</a>';
                    $type .= '</div>';
                }
                echo $type;
            }
        ?>
        <div class="clear"></div>
    </section>
    <section class="signIn right60">
        <div class="oneBlock">
            <div class="text">
                <?php
                if($cfs->get('sign_up_text', '5' )) {
                    $pages = $cfs->get('sign_up_text', '5');
                    echo $pages;
                }
                ?>
            </div>
            <div class="buttonsLog">
                <a class="oneSignUp" target="_blank" rel="nofollow" href="https://www.voicebuy.com/wholesale/subscribe.php" onclick="recordOutboundLink(this, 'outbound', 'sign_up');return false;">Sign up for free</a>
                <a class="oneTest" rel="nofollow" href="#" onclick="return false;">Test Voicebuy for Free</a>
                <div class="clear"></div>
            </div>
        </div>
        <div class="twoBlock">
            <?php
            $typ = '';
            $typ .= '<div class="serVOb">';
            $typ .= ' <div class="serviceMini">';
            $typ .= '  <p>'.$cfs->get('product_fixed_top_title', '5').'</p>';
            $typ .= ' </div>';
            $typ .= ' <div id="open" class="SerVContent">';
            $typ .= '<p>'.$cfs->get('product_fixed_top_text', '5').'</p>';
            $typ .= ' </div>';
            $typ .= '</div>';
            echo $typ;
            if($cfs->get('insert_products', '5' )) {
                $pages = $cfs->get('insert_products', '5');
                $type = '';
                foreach ($pages as $id) {
                    $type .= '<div class="serVOb">';
                    $type .= ' <div class="serviceMini">';
                    $type .= '  <p>'.get_the_title($id).'</p>';
                    $type .= ' </div>';
                    $type .= ' <div class="SerVContent">';
                    $type .= '<p>'.$cfs->get('text_desc', $id).'</p>';
                    $type .= ' </div>';
                    $type .= '</div>';
                }
                echo $type;
            }
            ?>
        </div>
        <div class="clear"></div>
    </section>
    <section class="awards right60">
        <div class="awardsTop">
            <h2>Voicebuy Awards</h2>
            <div class="awardsShadow"></div>
            <div class="clear"></div>
        </div>
        <div class="awardsContent">
            <?php
            if($cfs->get('voicebuy_awards', '5' )) {
                $pages = $cfs->get('voicebuy_awards', '5');
                $type = '';
                foreach ($pages as $im => $ins) {
                    $type .= '<div class="awards">';

                    $type .= '<img src="'.$ins['image'].'" alt="">';
                    $type .= '</div>';
                }
                echo $type;
            }
            ?>
        </div>
    </section>
<?php get_footer();?>