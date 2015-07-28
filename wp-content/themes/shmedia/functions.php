<?php
if ( function_exists('register_sidebars') )
    register_sidebars(3);
/* //////////////////////////////////add thumbnails///////////////////////////////////// */
add_theme_support('post-thumbnails');
function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'extra-menu' => __( 'Extra Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );


remove_action('wp_head', 'wp_generator');
/*add our teams*/
register_post_type('Our Team', array(
    'labels' => array(
        'name' => __('Our Team', 'doc'),
        'singular_name' => __('Team', 'doc'),
        'menu_name' => __('Our Team', 'doc'),
        'add_new' => __('Add New Team Person', 'doc'),
        'add_new_item' => __('Add Team Person Item', 'doc'),
        'edit_item' => __('Edit Team Person', 'doc'),
        'new_item' => __('New Team Person', 'doc'),
        'view_item' => __('View Team Person', 'doc'),
        'search_items' => __('Search Team Persons', 'doc'),
        'not_found' => __('No Team Person found', 'doc'),
        'not_found_in_trash' => __('No About Team Person found in Trash', 'doc'),
    ),
//    'public' => true,
//    'rewrite' => array('slug' => 'our-team', 'with_front' => false),
    'has_archive' => false,
    'show_ui' => false,
    'supports' => array('title', 'thumbnail', 'editor'),
));
register_post_type('Testimonials', array(
    'labels' => array(
        'name' => __('Testimonials', 'doc'),
        'singular_name' => __('Testimonials', 'doc'),
        'menu_name' => __('Testimonials', 'doc'),
        'add_new' => __('Add New Testimonial', 'doc'),
        'add_new_item' => __('Add Testimonial', 'doc'),
        'edit_item' => __('Edit Testimonial', 'doc'),
        'new_item' => __('New Testimonial', 'doc'),
        'view_item' => __('View Testimonial', 'doc'),
        'search_items' => __('Search Testimonials', 'doc'),
        'not_found' => __('No Team Testimonial found', 'doc'),
        'not_found_in_trash' => __('No About Testimonial found in Trash', 'doc'),
    ),
//    'public' => true,
//    'rewrite' => array('slug' => 'testimonials', 'with_front' => false),
    'has_archive' => false,
    'show_ui' => false,
    'supports' => array('title', 'thumbnail', 'editor'),
));


/*pagination*/
function pagination(){
    class Pagination{
        public $pag_id;   		/* Page id */
        public $limit;    		/* Posts limit in page*/
        public $start;    		/* Start limit posts */
        public $page_num; 		/* page number  */
        public $cat_id;   		/* Post category ID */
        public $cat_name; 		/* Post category name */
        public $count_post;    	/* posts count */
        public $total;    		/* Page count */
        public $args;
        static $cnt = 0;
        protected $posts;
        protected $post;
        public function __construct($l,$c_n){

            $this->limit = $l;
            $this->cat_name = $c_n;
        }
        public function counterCat() {

            $this->args = array(
                'posts_per_page'   => -1,
                'category_name'   => $this->cat_name,
                'suppress_filters' => 0

            );

            $this->posts = get_posts( $this->args );
            foreach ( $this->posts as $this->post ) {
                ++self::$cnt;
            }
        }
        public function _setPagination(){
            $this->pag_id = $post->ID;
            $this->page_num = $_GET['page_num'];
            $this->total = self::$cnt / $this->limit;
            $this->total = ceil($this->total);

            if(empty($this->page_num) or $this->page_num < 0) $this->page_num = 1;
            if($this->page_num > $this->total) $this->page_num = $this->total;

            $this->start = $this->page_num * $this->limit - $this->limit;
        }
        public function _setPaginationNum(){
            //Prev page button and first page buttton
            if ($this->page_num != 1) $pervpage = "<a class='fa fa-angle-double-left' href='?p=$this->pag_id&page_num=1'></a>  ";
            /* Next page button and last page button*/
            if ($this->page_num != $this->total) $nextpage = " <a class='fa fa-angle-double-right' href=?p=$this->page_id&page_num=".$this->total."></a> ";
            /* nearest 4 page number in left */
            if($this->page_num - 4 > 0) $page4left = "<a href=?p=$this->pag_id&page_num=".($this->page_num - 4).">".($this->page_num - 4)."</a>";
            if($this->page_num - 3 > 0) $page3left = "<a href=?p=$this->pag_id&page_num=".($this->page_num - 3).">".($this->page_num - 3)."</a>";
            if($this->page_num - 2 > 0) $page2left = "<a href=?p=$this->pag_id&page_num=".($this->page_num - 2).">".($this->page_num - 2)."</a>";
            if($this->page_num - 1 > 0) $page1left = "<a href=?p=$this->pag_id&page_num=".($this->page_num - 1).">".($this->page_num - 1)."</a>";
            /* nearest 4 page number in right */
            if($this->page_num + 4 <= $this->total) $page4right = "<a href=?p=$this->pag_id&page_num=".($this->page_num + 4).">".($this->page_num + 4)."</a>";
            if($this->page_num + 3 <= $this->total) $page3right = "<a href=?p=$this->pag_id&page_num=".($this->page_num + 3).">".($this->page_num + 3)."</a>";
            if($this->page_num + 2 <= $this->total) $page2right = "<a href=?p=$this->pag_id&page_num=".($this->page_num + 2).">".($this->page_num + 2)."</a>";
            if($this->page_num + 1 <= $this->total) $page1right = "<a href=?p=$this->pag_id&page_num=".($this->page_num + 1).">".($this->page_num + 1)."</a>";

            if($this->total > 1){
                echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left."<a class='active_num'>".$this->page_num.
                    '</a>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
            }

        }
    }

}























/******************************* OLD ******************************/

function admin_init(){
    add_meta_box("et_post_meta", "Rate Settings", "et_post_meta", "post", "normal", "high");
}
add_action("admin_init", "admin_init");

function et_post_meta($callback_args) {
    global $post,$wpdb,$current_user;




    $custom = get_post_custom($post->ID);

    $xml =  isset($custom["xml"][0]) ? $custom["xml"][0] : '';
    $xls =  isset($custom["xls"][0]) ? $custom["xls"][0] : '';
    $actday =  isset($custom["actday"][0]) ? $custom["actday"][0] : '';
    $old_product_id =  isset($custom["old_product_id"][0]) ? $custom["old_product_id"][0] : '';
    if(isset($custom['show'][0]) && $custom['show'][0] == 'on'){$show = 'checked';}else{$show = '';} ;
    if(isset($custom['description'][0]) && $custom['description'][0] == 'on'){$desc = 'checked';}else{$desc = '';}
    if(isset($custom['subscription'][0]) && $custom['subscription'][0] == 'on'){$subscription = 'checked';}else{$subscription = '';};
    $post_categories = wp_get_post_categories($post->ID);
    $term_id = $post_categories[0];
    $sql = "SELECT id FROM rates WHERE term_id=".$term_id;
    $product_cur_id = $wpdb->get_row($sql);
    $product_id = ($old_product_id)?$old_product_id:$product_cur_id->id;


    $child = get_post_meta($post->ID, 'actday',true);
    if($child > date("Y-m-d")){
        $int_next = 1;
    }
    $pageURL = 'http://';
    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    ?>
<!--    --><?php //if($int_next){?>
<!--        <p style="margin-bottom: 22px;">-->
<!--            <label for="sss">Send Mail: </label><br/>-->
<!--            <a href="https://www.voicebuy.com/wholesale/cms/mailing.php?fn=--><?php //echo urlencode($xls); ?><!--&prid=--><?php //echo $product_id ?><!--&backurl=--><?php //echo urlencode($pageURL) ?><!--" >Send</a>-->
<!--        </p>-->
<!--    --><?php //}?>
<!--    <p style="margin-bottom: 22px;">-->
<!--        <label for="old_product_id">Old Product ID: </label><br/>-->
<!--        <input id="old_product_id" type="text"  name="old_product_id" value="--><?php //echo($old_product_id); ?><!--"/>-->
<!--    </p>-->
<!--    <p style="margin-bottom: 22px;">-->
<!--        <label for="et_upload_image2">Show in slider: </label><br/>-->
<!--        <input id="et_upload_image2" --><?php //echo $show; ?><!-- type="checkbox"  name="show" />-->
<!--        <small>(Show)</small>-->
<!--    </p>-->
<!--    <p style="margin-bottom: 22px;">-->
<!--        <label for="et_upload_image2">description: </label><br/>-->
<!--        <input id="et_upload_image2" --><?php //echo $desc; ?><!-- type="checkbox"  name="description" />-->
<!--        <small>(description)</small>-->
<!--    </p>-->
<!--    <p style="margin-bottom: 22px;">-->
<!--        <label for="email_id">Show For Subscription </label><br/>-->
<!--        <input id="email_id" --><?php //echo $subscription; ?><!-- type="checkbox"  name="subscription" />-->
<!--        <small>(subscription)</small>-->
<!--    </p>-->
    <p style="margin-bottom: 22px;">
        <label for="et_upload_image2">XLS: </label><br/>
        <input id="et_upload_image2" type="text" size="90" name="xls" value="<?php echo($xls); ?>" />
        <input class="upload_image_button" type="button" value="Upload XLS" /><br/>
        <small>(enter an URL or upload an xls)</small>
    </p>
    <p style="margin-bottom: 22px;">
        <label for="et_upload_image">XML: </label><br/>
        <input id="et_upload_image" type="text" size="90" name="xml" value="<?php echo($xml); ?>" />
        <input class="upload_image_button" type="button" value="Upload XML" /><br/>
        <small>(enter an URL or upload an xml)</small>
    </p>
    <p style="margin-bottom: 22px;">
        <label for="et_upload_image">Activation date: </label><br/>
        <?php if (is_admin()) {?>
            <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.3/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
            <script type="text/javascript">
                $(function() { $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' }); });
            </script>
        <?php } ?>
        <input id="datepicker" type="text" name="actday" value="<?php echo($actday); ?>"/>
        <small>(enter activation date)</small>
    </p>

<?php

}
function save_details($post_id){
    global $post, $wpdb;

    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;

    if (isset($_POST["et_upload_video"]) && $_POST["et_upload_video"] <> '') update_post_meta($post->ID, "video_video", $_POST["et_upload_video"]);
    if (isset($_POST["xml"]) && $_POST["xml"] <> '') update_post_meta($post->ID, "xml", $_POST["xml"]);
    if (isset($_POST["xls"]) && $_POST["xls"] <> '')  update_post_meta($post->ID, "xls", $_POST["xls"]);
    update_post_meta($post->ID, "show", $_POST["show"]);
    update_post_meta($post->ID, "description", $_POST["description"]);
    update_post_meta($post->ID, "subscription", $_POST["subscription"]);
    update_post_meta($post->ID, "old_product_id", $_POST["old_product_id"]);
    if ($_POST["actday"] == '')  {}else{
        update_post_meta($post->ID, "actday", $_POST["actday"]);}
    if($_POST["actday"] == ''){}
//echo "<pre>"; var_dump($_POST);echo "</pre>";
    if(isset($_POST["description"])&&$_POST["description"] == 'on' && isset ($_POST["subscription"]) && $_POST["subscription"] == 'on'){

        //	$insert_sql = "DELETE FROM rates;";
        /*
         $insert_sql = "CREATE TABLE `rates` (
      `id` int(11) NOT NULL,
      `title` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";*/
        //  $wpdb->query($insert_sql);

        /*$insert_sql = "CREATE TABLE `rates` (
          `id` int(11) NOT NULL,
          `title` varchar(255) NOT NULL,
          `term_id` int(11) NOT NULL,
          PRIMARY KEY (`id`),
          UNIQUE KEY `UniqueTermId` (`term_id`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
        $wpdb->query($insert_sql);*/


        $post_title = $wpdb->escape($_POST["post_title"]);
        $post_category = 0;
        if(!$_POST["post_category"][0]){
            $post_category = $_POST["post_category"][1];
        }
        $old_id = $_POST['old_product_id'];

        $getProduct = $wpdb->get_row("SELECT name FROM wp_terms WHERE term_id = $post_category");
        $getProductName = $getProduct->name;

        if(isset($old_id) && $old_id!=""){

            $prod_id = $old_id;
            $getRate = $wpdb->query("SELECT id, title FROM rates WHERE id = $prod_id");

            if( empty($getRate) ) {

                $getRate = $wpdb->query("SELECT id, title FROM rates WHERE term_id = $post_category");

                if( empty($getRate) ){
                    $wpdb->query("INSERT INTO rates (id, title, term_id) VALUES ($prod_id, '$getProductName', $post_category)");
                } else {
                    $wpdb->query("UPDATE rates SET id=$prod_id, title='$getProductName' WHERE term_id=$post_category");
                }
            }

        } else {

            $getRate = $wpdb->query("SELECT id, title FROM rates WHERE id = $post_category");

            if( empty($getRate) ){

                $getRate = $wpdb->query("SELECT id, title FROM rates WHERE term_id = $post_category");

                if( empty($getRate) ){
                    $wpdb->query("INSERT INTO rates (id, title, term_id) VALUES ($post_category, '$getProductName', $post_category)");
                } else {
                    $wpdb->query("UPDATE rates SET id=$post_category, title='$getProductName' WHERE term_id=$post_category");
                }
            }

        }
        //echo "<pre>"; var_dump($_POST);echo "</pre>";



    }

}

add_action('save_post', 'save_details');
function upload_scripts() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_register_script('my-upload', get_bloginfo('template_directory').'/js/custom_uploader.js', array('jquery','media-upload','thickbox'));
    wp_enqueue_script('my-upload');

}

function upload_styles() {
    wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'upload_scripts');
add_action('admin_print_styles', 'upload_styles');


function addUploadMimes($mimes) {
    $mimes = array_merge($mimes, array(
        'rar|xls|xml|tmbundle|tmCommand|tmDragCommand|tmSnippet|tmLanguage|tmPreferences' => 'application/octet-stream'
    ));
    return $mimes;
}
add_filter('upload_mimes', 'addUploadMimes');





function csv_to_array_custom($filename='', $delimiter=',', $letter)
{

    /* if(!file_exists($filename) || !is_readable($filename))
         return FALSE;
 */
    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
        {

            if($letter != substr($row[1], 0,1)){
                continue;
            }

            $data[] = $row;
        }
        fclose($handle);
    }
    return $data;
}



























/************************************* add admin files******************************************/

add_action('admin_head', 'custom_admin_js');
function custom_admin_css() {
    echo '<link rel="stylesheet"  type="text/css" href="'.get_stylesheet_directory_uri().'/admin/admin-style.css" />';
}

add_action('admin_head', 'custom_admin_css');
