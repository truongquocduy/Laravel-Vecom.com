$('.owl-carousel-banner').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots: true,
    autoplay:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
$('.owl-carousel-detail').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:false,
    margin:10,
    dots:false,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})
$(".search-span").on('click', function() {
    $(this).closest('form').submit();
});

var isShowFormComment = 'none';
$("#write-comment").on('click', function() {
    isShowFormComment = (isShowFormComment == 'none') ? 'block' : 'none'
    $(".comment-edit").css('display', isShowFormComment);
})

function selectRatingStar(element) {

    var listStars = $('.rating-star')
    listStars.css('color', 'black')
    for (let i = 0; i < element.getAttribute('data-rating'); i++) {
        listStars[i].style.color = 'goldenrod'
        
    }
    $("#star-number-hidden").val(element.getAttribute('data-rating'))
    

}