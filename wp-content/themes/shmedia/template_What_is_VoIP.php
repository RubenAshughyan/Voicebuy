<?php
/*
 * Template Name: What is VoIP
 *
 *
*/
get_header();
global $post;
global $cfs;
$postID = $post->ID;?>

<section class="whatisvoip right60">
    <h2 class=" bordBot"><?php echo get_the_title($postID); ?></h2>
<?php
    if($cfs->get('box', $postID )) {
        $pages = $cfs->get('box', $postID);
        $type = '';
        foreach ($pages as $im => $ins) {
            $type .= '<div class="box">';
                $type .= '<div class="bordWhat">'.$ins['box_title'].'</div>';
                $type .= '<div class="boxCont">';
                    $type .= '<div class="boxText">';
                        $type .= '<p>'.$ins['box_content'].'</p>';
                    $type .= '</div>';
                    $type .= '<div class="boxImg">';
                        $type .= '<img src="'.$ins['box_image'].'">';
                    $type .= '</div>';
                    $type .= '<div class="clear"> </div>';
                $type .= '</div>';
                $type .= '<div class="clear"> </div>';
            $type .= '</div>';
        }
        echo $type;
    }
?>
</section>


<?php get_footer(); ?>