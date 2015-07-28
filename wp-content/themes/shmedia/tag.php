<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage shmedia
 * @since shmedia 1.0
 */
 get_header();
$cta = get_queried_object();
            $id =$cta->cat_ID;?>
            <div class="sidebarAllBlog">
                <div class="blogCont">
                    <?php
                    $tag = single_tag_title("", false);
                    pagination();
                    $pagination = new Pagination(4,'whats-new');
                    $pagination->counterCat();
                    $pagination->_setPagination();

                    $args = array(
                        'post_type'        =>'post',
                        'category'         => $id,
                        'posts_per_page'   => $pagination->limit,
                        'offset'           => $pagination->start,
                        'order'            =>'DESC',
                        'suppress_filters' => 0,
                        'tag'              => $tag
                    );

                    $posts = get_posts( $args );
                    foreach ( $posts as $post ) {
                        $ID_r = $post->ID;
//                        var_dump(wp_get_post_tags($ID_r));
                        $content_post = get_post($ID_r);
                        $content = $content_post->post_content;
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(']]>', ']]&gt;', $content);
                        $author_id=$post->post_author;
                        $category = get_the_category( $ID_r );
                        $catName = $category[0]->cat_name;
                        $catSlug = $category[0]->slug;
                        $blog = '';
                        $blog .= '<div class="blogPost">';
                        $blog .= '<div class="postTop">';
                        $blog .= '<h2>'.get_the_title($ID_r).'</h2>';
                        $blog .= '</div>';
                        $blog .= '<div class="postContent">';
                        $blog .= '<div class="postImage">';
                        $blog .= get_the_post_thumbnail($ID_r);
                        $blog .= '</div>';
                        $blog .= '<div class="postText">';
                        $blog .= mb_substr($content, 0, 400, 'UTF-8').' ...';
                        $blog .= '</div>';
                        $blog .= '<div class="clear"></div>';
                        $blog .= '</div>';
                        $blog .= '<div class="postBottom">';
                        $blog .= '<div class="postBottomLeft">';
                        $blog .= '<div class="date">';
                        $blog .= '<span class="fa fa-clock-o"></span>'.get_the_date( 'F d Y',$ID_r );
                        $blog .= '</div>';
                        $blog .= '<div class="author">';
                        $blog .= '<span class="fa fa-user"></span>'.get_the_author_meta( 'user_nicename' , $author_id );
                        $blog .= '</div>';
                        $blog .= '<div class="categoryPost">';
                        $blog .= '<span class="fa fa-folder-open"></span>'.'<a href="'.get_home_url().'/category/'.$catSlug.'">'.$catName.'</a>';
                        $blog .= '</div>';
                        $blog .= '<div class="clear"></div>';
                        $blog .= '</div>';
                        $blog .= '<div class="postBottomRight">';
                        $blog .= '<a href="'.get_the_permalink($ID_r).'">Read More</a>';
                        $blog .= '</div>';
                        $blog .= '<div class="clear"></div>';
                        $blog .= '</div>';
                        $blog .= '</div>';
                        echo $blog;
                    }
                    ?>
                    <div class="pagination-num">
                        <div class="numbers">
                            <?php $pagination->_setPaginationNum(); ?>
                            <div class="line"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="blogSidebar">
                    <?php get_sidebar(); ?>
                </div>
                <div class="clear"></div>
            </div>
<?php get_footer(); ?>