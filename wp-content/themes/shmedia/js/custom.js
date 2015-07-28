jQuery(document).ready(function($){
    if($('.twoBlock')) {
        $('.twoBlock .serviceMini').on('click', function(){
            $('.SerVContent').slideUp(400);
            if($(this).next().css('display') == "block")
                $(this).css({borderBottom:'1px solid transparent'})
                    .next().slideUp(400);
            else
                $(this).css({borderBottom:'1px solid rgba(128, 128, 128, 0.08)'})
                    .next().slideDown(400);
        });
    }
    /*faq's*/
    $('.tabTitle').on('click', function(){
        if(!$(this).hasClass('active'))
        {
            $('.tabTitle').removeClass('active');
            $(this).addClass('active');
        }
        var dataId = $(this).attr('data-id');
        console.log(dataId);
        $('.tabs ul').each(function(){
            var ulDataId = $(this).attr('data-id');
            console.log(ulDataId);
            if(ulDataId == dataId && !$('ul[data-id="'+dataId+'"]').hasClass('active'))
            {
                $('.tabs ul').removeClass('active');
                $('ul[data-id="'+dataId+'"]').addClass('active');
            }

        })
    });
    $('.tabs .quest').on('click', function(){
        $('.answer').slideUp(400);
        if($(this).next().css('display') == "list-item")
            $(this).next().slideUp(400);
        else
            $(this).next().slideDown(400);
    });
    $('.popularQuestions .ques').on('click', function(){
        $('.ans').slideUp(400);
        if($(this).next().css('display') == "list-item")
            $(this).next().slideUp(400);
        else
            $(this).next().slideDown(400);
    });
    $('.toggle .gloss').on('click', function(){
        $('.glossAnswer').slideUp(400);
        $('.toggle .gloss').find('span').removeClass('fa-minus').addClass('fa-plus');
        if($(this).next().css('display') == "list-item"){
            $(this).find('span').removeClass('fa-minus').addClass('fa-plus');
            $(this).next().slideUp(400);
        }
        else{
            $(this).next().slideDown(400);
            $(this).find('span').removeClass('fa-plus').addClass('fa-minus');
        }
    });

    function menuClick(){
        if($(window).width() < 1000)
        {
            $('#menu-top > li').each(function(event){
               $(this).find('a').first().click(function(e){
                   if($(this).parent().hasClass('menu-item-has-children')) {
                       e.preventDefault();
                       $(this).next().stop(true, false).slideToggle();
                   }
               })
           });
            $('.miniButton').on('click', function(){
                $('#menu-top').stop(true, false).slideToggle();
            })
        }
    }
    menuClick();








    var d = new Date();
    var n = d.getFullYear();
    $('#footer .bottom .year').append(n);














    /* Map  */
    function pageOnLoad() {

        var centerLatLng = new google.maps.LatLng(39.758275,-75.56138);

        var mapOptions = {

            zoom: 16,
            scrollwheel: false,
            center: centerLatLng,

            mapTypeId: google.maps.MapTypeId.ROADMAP

        };

        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        var marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(39.758275,-75.56138),
            title: 'Voicebuy'
        });
        marker.setIcon('/wp-content/themes/shmedia/images/marker.png');
        var label = '<div style="text-align: center">' +
                        '<p>Voicebuy Voip Provider</p>' +
                        '<img src="/wp-content/themes/shmedia/images/Voicebuy-logo.png" alt="logo" width="150px">' +
                        '<p>19C Trolley Square</p>' +
                        '<p>Wilmington, DE 19806</p>' +
                        '<p>United States</p>'+
                        '<a style="margin: 5px" class="fa fa-user" target="_blank" rel="nofollow" href="https://www.voicebuy.com/wholesale/cust_login.php"> Login</a>'+
                        '<a style="margin: 5px" target="_blank" rel="nofollow" href="https://www.voicebuy.com/wholesale/subscribe.php">Sign up</a>'+
                    '</div>';
        var infoWindow = new google.maps.InfoWindow({
            content: label
        });
        google.maps.event.addListener(marker, 'click', function() {
            infoWindow.open(map,marker);
        });
    }
    pageOnLoad();
});
