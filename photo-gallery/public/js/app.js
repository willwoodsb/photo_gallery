let currentSlide = 0;
let photoCount;
$(document).ready(function(){


    const photoNumber = function () {
        let i = 0;
        while ($(`#${i}`).length) {
            i++;
        }
        return i;
    }


    photoCount = photoNumber();

    featuredHeight();

    if ($('.featured').length) {
        $(`#0`).fadeIn(300);
    }
});

function timeLoop() {
    setTimeout(function() {
        $(`#${currentSlide}`).fadeOut(300);
        if (currentSlide < photoCount - 1) {
            currentSlide++ 
        } else {
            currentSlide = 0;
        }
        setTimeout(function() {
            $(`#${currentSlide}`).fadeIn(300);
            timeLoop();
        }, 300);
    }, 6000)
}
if ($('.featured').length) {
    timeLoop();
}




$('.image-container').on('click', function (e) {
    if ($(e.target).parent().hasClass('title-overlay__inner')) {
        $target = $(e.target).parent().parent();
    } else {
        $target = $(e.target);
    }
    currentSlide = $target.siblings().attr('id');
    $(`#img-${currentSlide}`).show().addClass('slide-container-active');

    $('#slide-overlay').css('visibility', 'visible');
    
})

let lastScrollTop = 0;
let stuck = false;

$(window).scroll(function(){
    let nowScrollTop = $(this).scrollTop();
    if (nowScrollTop < 200) {
        if (stuck) {
           stuck = !stuck;
            $('.sticky').removeClass('sticky-reveal'); 
        }
    } else {
        if (nowScrollTop < lastScrollTop && !stuck) {
            stuck = !stuck;
            $('.sticky').addClass('sticky-reveal');
        } else if (nowScrollTop > lastScrollTop && stuck) {
            stuck = !stuck;
            $('.sticky').removeClass('sticky-reveal');
        }
    }
    lastScrollTop = nowScrollTop;
});

$('.sticky').on('click', function() {
    $('html, body').stop().animate({
        scrollTop: 0
    }, 500);
})

$('#slide-overlay').on('click', function (e) {
    if (e.target.id == 'slide-overlay') {
        $('#slide-overlay').css('visibility', 'collapse');
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

$(window).on('resize', function(){
    featuredHeight();
    // verticalCenterItem();
})

open = false;
$('.open').on('click', function(e) {
    getTarget(e);
    if (!open) {
        $(`#sub-${$item}`).slideDown(200);
        rotate($(`#rotate-${$item}`), 180);
        open = true;
    } else {
        rotate($(`#rotate-${$item}`), 0);
        $(`#sub-${$item}`).slideUp(200);
        open = false;
    }
    
})

$('.open-menu').on('click', function() {
    $('.side-menu').addClass('side-menu-open');
})
$('.close-menu').on('click', function() {
    $('.side-menu').removeClass('side-menu-open');
})


function addTransition(target, time) {
    $(target).css('transition', `${time}s ease`);
    setTimeout (function() {
      $(target).css('transition', ``);
    }, (time* 1000));
}

function changeSlide (currentSlide) {
    $('.slide-container').removeClass('slide-container-active').fadeOut(200);
    setTimeout(function() {
        $(`#img-${currentSlide}`).addClass('slide-container-active').fadeIn(200);
    }, 200)
    
}

function featuredHeight() {
    let height = $(window).height() - $('header').height();
    $('.featured').css('height', height-1);
}

function getTarget(e) {
    if ($(e.target).hasClass('rotate')) {
        $target = $(e.target).parent().attr('id');
    } else {
        $target = $(e.target).attr('id');
    }
    $item = $target.substr(5);
}

function rotate($target, amount) {
    $target.css('rotate', `${amount}deg`)
}
