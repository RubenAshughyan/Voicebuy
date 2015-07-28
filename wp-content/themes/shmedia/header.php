<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset="<?php bloginfo('charset'); ?>" />
    <title><?php wp_title(''); ?>&nbsp;|&nbsp;<? bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/responsive.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/font-awesome.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/wp-content/plugins/revslider/rs-plugin/css/settings.css?rev=4.6.0&ver=4.2.2" type="text/css" media="screen" />
    <link rel="shortcut icon" href="<?php  bloginfo('template_url') ?>/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.4&appId=1590023817916583";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <header>
        <div class="topBlack">
            <div class="container">
                <p>
                    <?php
                    if($cfs->get('phone_number', '5' )) {
                        $phone = $cfs->get('phone_number', '5');
                        echo($phone);
                    }
                    ?>
                </p>
            </div>
        </div>
        <div class="header">
            <div class="container">
                <div class="logo">
                    <a href="<?php echo get_home_url()?>">
                        <img src="<?php bloginfo('template_url') ?>/images/Voicebuy-logo.png" alt="voiceBuyLogo">
                    </a>
                </div>
                <div class="rightBar">
                    <div class="social">
                        <?php
                        $type = '<ul>';
                        if($cfs->get('social', '5' )) {
                            $loop = $cfs->get('social', '5');
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
                        echo $type;
                        ?>
                    </div>
                    <div class="regLog">
                        <div class="login">
                            <a class="fa fa-user" target="_blank" rel="nofollow" href="https://www.voicebuy.com/wholesale/cust_login.php" onclick="recordOutboundLink(this, 'outbound', 'log_in');return false;"> Login</a>
                        </div>
                        <div class="reg">
                            <a target="_blank" rel="nofollow" href="https://www.voicebuy.com/wholesale/subscribe.php" onclick="recordOutboundLink(this, 'outbound', 'sign_up');return false;">Sign up</a>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <nav class="TopMenu">
            <div class="container">
                <div class="miniButton">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <?php
                $defaults = array(
                    'menu'            => 'top',
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
        </nav>
    </header>

    <div id="main">

