<?php
/*
 * Template Name: Glossary
 *
 *
*/
get_header();
global $post;
global $cfs;
$id = $post->ID; ?>

<section class="glossary right60">
    <h2 class="bordBot">
        <?php echo get_the_title($id); ?>
    </h2>
    <ul class="toggle">
        <?php
        if($cfs->get('loop', $id)) {
            $pages = $cfs->get('loop', $id);
            $type = '';
            foreach ($pages as $im => $ins) {
                $type .= '<li class="gloss"><span class="fa fa-plus"></span> ';
                $type .= $ins['question'];
                $type .= '</li>';
                $type .= '<li class="glossAnswer">';
                $type .= $ins['answer'];
                $type .= '</li>';
            }
            echo $type;
        }
        ?>
    </ul>
</section>


<?php get_footer(); ?>