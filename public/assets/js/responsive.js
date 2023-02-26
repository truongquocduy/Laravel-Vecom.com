var list_menu = $( ".menu-primary" ).clone();
// $( ".menu-primary ul li:not(:first-child)" ).remove();
$( "#menu-responsive-area" ).append(list_menu);
$( ".menu-primary:last ul li:first-child" ).remove();
$(window).on('resize load', function(){
    if($( window ).width() < 600) {
        var list_social = $(".list-social").clone();
        $(".list-social").remove();
        $( ".wrapper" ).append(list_social);
        
    }else{
        var list_social = $(".list-social").clone();
        $(".list-social").remove();
        $( list_social ).prependTo( ".wrapper" );

    }
});
$("#btn-menu-responsive, #btn-menu-responsive-close").on('click', function(){
    if($("#menu-responsive-area").css("display") == "none"){
        $("#menu-responsive-area").show()
        $("#menu-responsive-area").animate({
            width: "100%"
        })
    }
    else{
        $("#menu-responsive-area").animate({
            width: "20%"
        },500,function(){
            $("#menu-responsive-area").hide()
        })
    }
});

// console.log($(".wrapper").outerHeight())
var lastScrollTop = 0;
$(window).on('scroll', function(){
    if($(window).scrollTop() >= $(".wrapper").height()){
        $("#navb").css("position","fixed")
        $("#navb").css("top","0")
        $("#navb").css("border-bottom","1px solid #eceef0")
    }
    else{
        $("#navb").css("position","unset")
    }
    var st = $(this).scrollTop();
    if (st < lastScrollTop){
        $(".wrapper").css("position","fixed")
        $(".wrapper").css("z-index","100")
        $("#navb").css("top",$(".wrapper").outerHeight())
    }
    if($(window).scrollTop() < $(".wrapper").outerHeight()){
        $(".wrapper").css("position","unset")

    }
    lastScrollTop = st;
});

$(".list-category-product li").on('click', function(event){
    if($(event.target).closest('li').next().hasClass( "list-category-down" )) {
        if($(event.target).next().css("display") !="block") {
            $(".list-category-down").css("display","none")
            $(event.target).next().css("display","block")
        }
        else{
            $(event.target).next().css("display","none")
        }
    }
});

