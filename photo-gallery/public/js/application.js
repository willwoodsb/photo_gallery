let currentSlide = 0;
let photoCount;
$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        items : 1,
    });

    const photoNumber = function () {
            let i = 0;
            while ($(`#${i}`).length) {
            i++;
        }
        return i;
    }

    photoCount = photoNumber();

});



$('.image-container').on('click', function (e) {
    if ($(e.target).parent().hasClass('title-overlay__inner')) {
        $target = $(e.target).parent().parent();
    } else {
        $target = $(e.target);
    }
    currentSlide = $target.siblings().attr('id');
    yOffset = $('.title-text').height() + 16;
    changeSlide(currentSlide);
    $('.owl-carousel').css('padding-top', `${yOffset}px`);

    $('#slide-overlay').css('visibility', 'visible');
    $('.owl-stage').css('transition', '.25s ease');
    
    
})

$('#slide-overlay').on('click', function (e) {
    if (e.target.id == 'slide-overlay') {
        addTransition('.owl-stage', 0);
        $('#slide-overlay').css('visibility', 'collapse');
        $('.owl-stage').css('transition', 'none');
    }
})

$('.arrow-right').on('click', function() {
    if (currentSlide < (photoCount - 1)) {
        currentSlide++;
    } else {
        currentSlide = 0;
    }
    
    changeSlide(currentSlide);
})

$('.arrow-left').on('click', function() {
    if (currentSlide > 0) {
        currentSlide--;
    } else {
        currentSlide = photoCount - 1;
    }
    
    changeSlide(currentSlide);
})

$(".delete").submit(function(e) {
    if ($(e.target).hasClass('delete-subCat')) {
        $message = 'Are you sure you want to delete this sub category and its associated photos?';
    } else {
        $message = "Are you sure you want to delete this post?";
    }
    if (confirm($message)) {
        return true;
    } else {
        return false;
    }
});


function addTransition(target, time) {
    $(target).css('transition', `${time}s ease`);
    setTimeout (function() {
      $(target).css('transition', ``);
    }, (time* 1000));
}

function changeSlide (currentSlide) {
    $('.owl-item').removeClass('active');
    $(`#img-${currentSlide}`).parent().addClass('active');
    $('.owl-stage').css('transform', `translate3d(${-1 * currentSlide * $('.owl-item').width()}px, 0, 0)`);
}
