<?php

get_header();
global $post;
global $cfs;
$id = $post->ID; ?>
    <div class="sidebarAllBlog">
        <div class="blogCont">
            <div class="singleTop">
                <h2>
                    <?php echo $post->post_title; ?>
                </h2>
                <div class="singleImage">
                    <?php echo get_the_post_thumbnail($id); ?>
                </div>
                <p>
                    <?php echo $post->post_content; ?>
                </p>
                <div class="social">
                    <ul>
                        <li>
                            <a  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="/feed">
                                <span class="fa fa-rss"></span>
                            </a>
                        </li>
                        <li>
                            <a  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="//www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>&p=<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($id))[0]; ?>">
                                <span class="fa fa-facebook"></span>
                            </a>
                        </li>
                        <li>

                            <a  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"  href="https://twitter.com/share">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>

                        <li>
                            <a   onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"  href="https://plus.google.com/share?url=<?php the_permalink(); ?>" >
                                <span class="fa fa-google-plus"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="fb-comments" data-href="<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>


        </div>
        <div class="blogSidebar">
            <?php get_sidebar(); ?>
        </div>
        <div class="clear"></div>
    </div>
<?php get_footer(); ?>