
$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        items : 1,
        nav : true
    });
});

$('.image-container').on('click', function (e) {
    if ($(e.target).parent().hasClass('title-overlay__inner')) {
        $target = $(e.target).parent().parent();
    } else {
        $target = $(e.target);
    }

    id = $target.siblings().attr('id');
    $('.owl-carousel').owlCarousel({
        items : 1,
        nav : true,
        startPosition: 1
    }).trigger('refresh.owl.carousel');
    
    $('#slide-overlay').css('visibility', 'visible');
    
})

$('#slide-overlay').on('click', function (e) {
    if (e.target.id == 'slide-overlay') {
        addTransition('.owl-stage', 0);
        $('#slide-overlay').css('visibility', 'collapse');
    }
})

function addTransition(target, time) {
    $(target).css('transition', `${time}s ease`);
    setTimeout (function() {
      $(target).css('transition', ``);
    }, (time* 1000));
}
