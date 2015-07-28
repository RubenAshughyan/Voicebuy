<section class="AboutServices right60">
    <h2>Voicebuy Services</h2>
    <?php
    global $cfs;
    if($cfs->get('insert_services', '5' )) {
        $pages = $cfs->get('insert_services', '5');
        $type = '';
        foreach ($pages as $ids) {
            $type .= '<div class="service">';
            $type .= '<a href="'.get_the_permalink($ids).'">';
            $type .= '<span class="fa '.$cfs->get('icon_class', $ids).'"></span>';
            $type .= '<div class="serviceCont">';
            $type .= '<p>'.get_the_title($ids).'</p>';
            $type .= '<p>'.mb_substr($cfs->get('description', $ids), 0, 100, 'UTF-8') . '...'.'</p>';
            $type .= '</div>';
            $type .= '</a>';
            $type .= '</div>';
        }
        echo $type;
    }
    ?>
    <div class="clear"></div>
</section>
    </div>
    <footer id="footer">
    <div class="top">
        <?php
        $defaults = array(
            'menu'            => 'bottom',
            'container'       => 'div',
            'container_id'    => 'topMenu',
            'menu_class'      => 'menu',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        );

        wp_nav_menu( $defaults );
        ?>
        <div class="clear"></div>
    </div>
    <div class="bottom">
        Copyright © <span class="year"></span> All rights reserved. Voice Trader LLC. 19C Trolley Square, Wilmington, DE 19806 USA
    </div>
  </footer>

  <script type="text/javascript" src="/wp-content/plugins/revslider/rs-plugin/js/jquery.themepunch.tools.min.js?rev=4.6.0&amp;ver=4.2.2"></script>
  <script type="text/javascript" src="/wp-content/plugins/revslider/rs-plugin/js/jquery.themepunch.revolution.min.js?rev=4.6.0&amp;ver=4.2.2"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=<?=ICL_LANGUAGE_CODE; ?>"></script>
  <script defer type="text/javascript" src="<?php bloginfo('template_url') ?>/js/custom.js"></script>
    <?php wp_footer(); ?>
    </body>
</html>