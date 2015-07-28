<div class="full">
    <div class="tabTitles">
        <div class="line"></div>
        <div title="Favorite Post" class="spans tabTitle active fa fa-star" data-id="1"></div>
        <div title="Tags" class="spans tabTitle fa fa-tags" data-id="2"></div>
        <div class="clear"></div>
    </div>
    <div class="tabs">
        <?php
        $args = array(
            'post_type'        =>'post',
            'category'         => 3,
            'order'            =>'DESC',
            'suppress_filters' => 0
        );
        ?>
        <ul class="active" data-id="1">
            <h2 class="blue bordBot">Favorite Post</h2>
            <?php
            $posts = get_posts( $args );
            foreach ( $posts as $post ) {
                $ID_r = $post->ID;
                if($cfs->get('favorite', $ID_r )) {
                    $fav = '';
                    $fav .= '<li>';
                        $fav .= '<div class="favPost">';
                            $fav .= '<a href="'.get_the_permalink($ID_r).'">';
                                $fav .= '<div class="favLeft">';
                                    $fav .= get_the_post_thumbnail($ID_r);
                                $fav .= '</div>';
                                $fav .= '<div class="favRight">';
                                    $fav .= '<div class="favTitle">';
                                        $fav .= mb_substr(get_the_title($ID_r), 0, 50, 'UTF-8');
                                    $fav .= '</div>';
                                    $fav .= '<div class="favDate">';
                                        $fav .= get_the_date( 'F d Y',$ID_r );
                                    $fav .= '</div>';
                                $fav .= '</div>';
                                $fav .= '<div class="clear"></div>';
                            $fav .= '</a>';
                        $fav .= '</div>';
                    $fav .= '</li>';
                    echo $fav;
                }
            }
            ?>
        </ul>
        <ul data-id="2">
            <h2 class="blue bordBot">Tags</h2>
            <?php
                $tags = get_tags();
                foreach($tags as $tag)
                {
                    echo '<a class="tags" href="'.get_home_url().'/tag/'.$tag->slug.'">'.$tag->name.'</a>';
                }

            ?>
        </ul>
    </div>
</div>