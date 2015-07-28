<?php
/*
 * Template Name: Rates
 *
 *
*/
$alphabet = array ("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
get_header();?>
<section class="rates right60">
    <div id="container">
        <div id="content" role="main">
            <?php
            if(isset ($_GET['rate'])){
            $small_cat =  $_GET['rate'];

            if(isset ($_POST['price'])){
                $price =  $_POST['price'];
            }else{
                $price = 1;
            }

            $postsByRate = query_posts("cat=$small_cat&meta_key=actday&showposts=3&orderby=meta_value&order=DESC");
            // $postsByRate = get_posts("category=$small_cat&meta_key=actday&numberposts=3&orderby=meta_value&order=DESC");


            $count_price = count($postsByRate);
            $child = get_post_meta($postsByRate[0]->ID, '');
            // echo $child["actday"][0]."->".date("Y-m-d");
            if($child["actday"][0] > date("Y-m-d")){
                $int_next = 1;
            }elseif($count_price == 3){
                $postsByRate = query_posts("cat=$small_cat&meta_key=actday&showposts=2&orderby=meta_value&order=DESC");
            }
            if($count_price == 2){
                if(isset ($int_next) && $int_next == 1){
                    $int_last = 1;

                }
            }


            $count_price = count($postsByRate);


            if($count_price == 1){
                $int = 1;
            }else{
                $int = 0;
            }
            if($count_price == 2 && !isset ($_POST['price'])){$price = 0;};
            while (have_posts()) : the_post();
                if($int == $price){
                    $post = $postsByRate[$price];
                    $child = get_post_meta($post->ID, '');
                    $post_categories = get_the_category($post->ID);


                    if($child['description'][0] != 'on'){
                        /*
                            $xmlDoc = new DOMDocument();
                            $xmlDoc->load($child['xml'][0]);
                            $x = $xmlDoc->documentElement;
                            $items = $x->childNodes->item(9)->childNodes->item(1);
                                $childNodesLength = $items->childNodes->length;

                            $rows = $items->getElementsByTagName('Row');
*/
                        if(isset($_POST['letter'])){
                            $letter = $_POST['letter'];
                        }else{
                            if(!isset ($_POST['viewall'])){
                                $letter = 'A';
                            }
                        }


                        $csv_to_array = csv_to_array_custom($child['xml'][0],',',$letter);

                        $first_letters = array();?>
                        <div class="padding_text">
                            <div class="text">
                                <h3 class="bordBot"><?php echo $post_categories[0]->name; ?>&nbsp; Rates</h3>
                                <p><strong>All calls are charged in 1/1 increments (per-second billing), except for USA (6/6), Mexico (60/60) and Gambia (60/1).</strong><br /><br /></p>
                                <div class="alphabet">
                                    <ul>

                                        <?php foreach ($alphabet AS $latterCurrent){?>
                                            <li>
                                                <form  action="<?php echo '?'. $_SERVER["QUERY_STRING"] ?>" method="POST">
                                                    <input type="hidden" name="letter" value="<?php echo $latterCurrent ?>">
                                                    <input type="submit" class="<?php if($latterCurrent == $letter){
                                                        echo 'select5';}else{echo "submitLink";} ?>" value="<?php echo $latterCurrent ?>">
                                                    <?php if(isset($_POST['price'])){ ?>
                                                        <input type="hidden" name="price" value="<?php echo $_POST['price'] ?>">

                                                    <?php } ?>
                                                </form>
                                            </li>
                                        <?php }?>

                                    </ul>
                                </div>

                                <div class="clr" style="height: 20px;"></div>
                                <?php if($count_price != 1){ ?>
                                    <?php if(isset($int_last) && $int_last == 1){}else{?>
                                        <div class="last">
                                            <form id="last price" action="<?php echo '?'. $_SERVER["QUERY_STRING"] ?>" method="POST">
                                                <input type="hidden" name="price" value="<?php if($count_price == 2){echo 1;}else{echo 2;} ?>">
                                                <?php if(isset($_POST['letter'])){ ?>
                                                    <input type="hidden" name="letter" value="<?php echo $_POST['letter'] ?>">
                                                <?php } ?>
                                                <a  href="javascript: submitform1()"><span><?php _e("Show Last price"); ?></span></a>
                                            </form>
                                            <script type="text/javascript">
                                                function submitform1()
                                                {
                                                    document.forms["last price"].submit();
                                                }
                                            </script>
                                        </div>
                                    <?php
                                    }
                                }
                                ?>
                                <div class="last">
                                    <form id="Current price" action="<?php echo '?'. $_SERVER["QUERY_STRING"] ?>" method="POST">
                                        <input type="hidden" name="price" value="<?php if($count_price == 2 && !isset($int_last) ){echo 0;}else{echo 1;} ?>">
                                        <?php if(isset($_POST['letter'])){ ?>
                                            <input type="hidden" name="letter" value="<?php echo $_POST['letter'] ?>">
                                        <?php } ?>
                                        <a  href="javascript: submitform2()"><span><?php _e("Show Current price"); ?></span></a>

                                    </form>
                                    <script type="text/javascript">
                                        function submitform2()
                                        {
                                            document.forms["Current price"].submit();
                                        }
                                    </script>
                                </div>
                                <?php if(isset ($int_next) && $int_next == 1){ ?>
                                    <div class="last">
                                        <form id="Next price" action="<?php echo '?'. $_SERVER["QUERY_STRING"] ?>" method="POST">
                                            <input type="hidden" name="price" value="0">
                                            <?php if(isset($_POST['letter'])){ ?>
                                                <input type="hidden" name="letter" value="<?php echo $_POST['letter'] ?>">
                                            <?php } ?>
                                            <a  href="javascript: submitform3()"><span><?php _e("Show Next price"); ?></span></a>
                                        </form>
                                        <script type="text/javascript">
                                            function submitform3()
                                            {
                                                document.forms["Next price"].submit();
                                            }
                                        </script>
                                    </div>
                                <?php } ?>
                                <?php if(isset($child['xls'][0])){ ?>
                                    <?php if(isset ($int_next) && $int_next == 1){ ?>
                                        <div class="xls">
                                            <? if($price == 0){ ?>
                                                <a target="_blank" href="<?php echo $child['xls'][0]; ?>" onclick="_gaq.push(['_trackEvent', 'Ratesheets', 'Download']);"><?php _e("Download Next price"); ?></a>
                                            <? }elseif($price == 1){ ?>
                                                <a target="_blank" href="<?php echo $child['xls'][0]; ?>" onclick="_gaq.push(['_trackEvent', 'Ratesheets', 'Download']);"><?php _e("Download Current price"); ?></a>
                                            <? }else{ ?>
                                                <a target="_blank" href="<?php echo $child['xls'][0]; ?>" onclick="_gaq.push(['_trackEvent', 'Ratesheets', 'Download']);"><?php _e("Download Last price"); ?></a>
                                            <? } ?>
                                        </div>
                                    <?php } else {?>
                                        <div class="xls">
                                            <? if($price == 0){ ?>
                                                <a target="_blank" href="<?php echo $child['xls'][0]; ?>" onclick="_gaq.push(['_trackEvent', 'Ratesheets', 'Download']);"><?php _e("Download Current price"); ?></a>
                                            <? }elseif($price == 1){ ?>
                                                <a target="_blank" href="<?php echo $child['xls'][0]; ?>" onclick="_gaq.push(['_trackEvent', 'Ratesheets', 'Download']);"><?php _e("Download Last price"); ?></a>
                                            <? }else{ ?>
                                                <a target="_blank" href="<?php echo $child['xls'][0]; ?>" onclick="_gaq.push(['_trackEvent', 'Ratesheets', 'Download']);"><?php _e("Download Last price"); ?></a>
                                            <? } ?>
                                        </div>
                                    <?php }?>
                                <?php } ?>
                                <div class="active">
                                    <?php _e("Activation date:"); ?><font style="color:#12b2e9;"><?php echo $child['actday'][0] ?></font>
                                </div>
                                <div class="clr"></div>


                                <div class="listBoxes">
                                    <div class="topPanel">
                                        <p class="codeTop">Code</p>
                                        <p class="destTop">Destination</p>
                                        <p class="priceTop">Price in USD</p>
                                    </div>
                                    <ul id="listUL">

                                        <?php for($i=0;$i<count($csv_to_array);$i++){


                                            ?>

                                            <?php

                                            if($csv_to_array[$i][1] === $csv_to_array[$i+1][1] && $csv_to_array[$i][2] === $csv_to_array[$i+1][2]){
                                                if(!empty($csv_to_array[$i][0])){
                                                    $arrayBox[] = $csv_to_array[$i][0];
                                                }
                                                continue;

                                            } else{
                                                $arrayBox[] = $csv_to_array[$i][0];
                                            }
                                            // print_r($arrayBox);

                                            if(count($arrayBox) > 11){
                                                $issLI = 'list open';
                                            } else{
                                                $issLI = 'float';
                                            }
                                            ?>
                                            <li class="<?php echo $issLI;?>" data-count="<?php echo count($arrayBox);?>">
                                                <p class="height"><?php if(empty($arrayBox)){ echo $csv_to_array[$i][0]; }
                                                    else{
                                                        $list = implode(',',$arrayBox);
                                                        if(count($arrayBox) <= 8){
                                                            echo $list;
                                                        } else{
                                                            for($j=0;$j<count($arrayBox);$j++){
                                                                /*
                                                            end($arrayBox);
                                                                if(key($arrayBox) == $j){echo ',';}
                                                                */
                                                                echo $arrayBox[$j].',';

                                                            }
                                                        }

                                                    }

                                                    ?>

                                                </p>
                                                <p><?php echo $csv_to_array[$i][1];?></p>
                                                <p><?php echo $csv_to_array[$i][2];?></p>
                                            </li>



                                            <?php unset($arrayBox);
                                        } ?>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    <?php }
                }$int++;
            endwhile ?>
        </div>
    </div>
    <?php }  ?>


    <script type="text/javascript">

        jQuery('li.list').on('click',function(){
            var height =  $('.height',this).height();
            var ty = $(this).attr('data-count');
            if($(this).hasClass('open'))
            {
                $(this).removeClass('open').css({backgroundImage: 'url(/wp-content/themes/shmedia/images/arrow_bottom.jpg)'});
                $('.height',this).css({height: +ty*3.84615385})
            }
            else
            {
                $('.height',this).css({height: 34});
                $(this).addClass('open').css({backgroundImage: 'url(/wp-content/themes/shmedia/images/arrow.jpg)'});
            }
        });
    </script>
</section>



<?php get_footer(); ?>