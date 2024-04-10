'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        /*------------------
            Product filter
        --------------------*/
        $('.filter__controls li').on('click', function () {
            $('.filter__controls li').removeClass('active');
            $(this).addClass('active');
        });
        if ($('.property__gallery').length > 0) {
            var containerEl = document.querySelector('.property__gallery');
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Search Switch
    $('.search-switch').on('click', function () {
        $('.search-model').fadeIn(400);
    });

    $('.search-close-switch').on('click', function () {
        $('.search-model').fadeOut(400, function () {
            $('#search-input').val('');
        });
    });

    //Canvas Menu
    $(".canvas__open").on('click', function () {
        $(".offcanvas-menu-wrapper").addClass("active");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".offcanvas-menu-overlay, .offcanvas__close").on('click', function () {
        $(".offcanvas-menu-wrapper").removeClass("active");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    /*------------------
		Navigation
	--------------------*/
    $(".header__menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Accordin Active
    --------------------*/
    $('.collapse').on('shown.bs.collapse', function () {
        $(this).prev().addClass('active');
    });

    $('.collapse').on('hidden.bs.collapse', function () {
        $(this).prev().removeClass('active');
    });

    /*--------------------------
        Banner Slider
    ----------------------------*/
    $(".banner__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });

    /*--------------------------
        Product Details Slider
    ----------------------------*/
    $(".product__details__pic__slider").owlCarousel({
        loop: false,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: ["<i class='arrow_carrot-left'></i>", "<i class='arrow_carrot-right'></i>"],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false,
        mouseDrag: false,
        startPosition: 'URLHash'
    }).on('changed.owl.carousel', function (event) {
        var indexNum = event.item.index + 1;
        product_thumbs(indexNum);
    });

    function product_thumbs(num) {
        var thumbs = document.querySelectorAll('.product__thumb a');
        thumbs.forEach(function (e) {
            e.classList.remove("active");
            if (e.hash.split("-")[1] == num) {
                e.classList.add("active");
            }
        })
    }
   
    
    
    


    /*------------------
		Magnific
    --------------------*/
    $('.image-popup').magnificPopup({
        type: 'image'
    });


    $(".nice-scroll").niceScroll({
        cursorborder: "",
        cursorcolor: "#dddddd",
        boxzoom: false,
        cursorwidth: 5,
        background: 'rgba(0, 0, 0, 0.2)',
        cursorborderradius: 50,
        horizrailenabled: false
    });

    /*------------------
        CountDown
    --------------------*/
    // For demo preview start
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    if (mm == 12) {
        mm = '01';
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, '0');
    }
    var timerdate = mm + '/' + dd + '/' + yyyy;
    // For demo preview end

    // Uncomment below and use your date //

    /* var timerdate = "2020/12/30" */

    $("#countdown-time").countdown(timerdate, function (event) {
        $(this).html(event.strftime("<div class='countdown__item'><span>%D</span> <p>Day</p> </div>" +
            "<div class='countdown__item'><span>%H</span> <p>Hour</p> </div>" +
            "<div class='countdown__item'><span>%M</span> <p>Min</p> </div>" +
            "<div class='countdown__item'><span>%S</span> <p>Sec</p> </div>"));
    });

    /*-------------------
		Range Slider
	--------------------- */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data('min'),
        maxPrice = rangeSlider.data('max');

    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minPrice, maxPrice],
        slide: function (event, ui) {
            minamount.val(formatCurrency(ui.values[0]) + 'đ');
            maxamount.val(formatCurrency(ui.values[1]) + 'đ');
        }
    });
    minamount.val(formatCurrency(rangeSlider.slider("values", 0)) + 'đ');
    maxamount.val(formatCurrency(rangeSlider.slider("values", 1)) + 'đ');

    /*------------------
		Single Product
	--------------------*/
    $('.product__thumb .pt').on('click', function () {
        var imgurl = $(this).data('imgbigurl');
        var bigImg = $('.product__big__img').attr('src');
        if (imgurl != bigImg) {
            $('.product__big__img').attr({
                src: imgurl
            });
        }
    });

    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span  class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        var maxValue = parseFloat($button.parent().find('input').attr('max'));
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
            // Check if new value exceeds maximum value
            if (newVal > maxValue) {
                newVal = maxValue;
            }
        } else {
            var newVal = parseFloat(oldValue) - 1;
            // Don't allow decrementing below zero
            if (newVal < 0) {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
    
    

    /*-------------------
		Radio Btn
	--------------------- */
    $(".size__btn label").on('click', function () {
        $(".size__btn label").removeClass('active');
        $(this).addClass('active');
    
      
        if ($('.size__btn label.active').length > 0 && $('.color__btn label.active').length > 0) {
    
        }
    });
    
    $(".color__btn label").on('click', function () {
        $(".color__btn label").removeClass('active');
        $(this).addClass('active');
    
      
        if ($('.size__btn label.active').length > 0 && $('.color__btn label.active').length > 0) {
  
        }
    });




    // function isAuthenticated() {
    //     // Trong ví dụ này, giả sử chúng ta có một biến global isAuthenticated
    //     // Biến này có thể được đặt khi người dùng đăng nhập thành công
    //     return isAuthenticated;
    // }
    // $(".site-btn").on('click', function (event) {
    //     // Ngăn chặn hành động mặc định của nút submit
    //     event.preventDefault();
        
    //     // Kiểm tra xem người dùng đã đăng nhập hay chưa
    //     if (isAuthenticated()) {
    //         // Nếu người dùng đã đăng nhập, cho phép mua hàng
    //         // Thực hiện các hành động cần thiết, chẳng hạn như gửi yêu cầu AJAX để đặt hàng
            
    //         // Ví dụ: Thực hiện gửi yêu cầu AJAX để đặt hàng
    //         $.ajax({
    //             url: '/place-order',
    //             type: 'POST',
    //             data: { /* Các dữ liệu cần thiết cho việc đặt hàng */ },
    //             success: function(response) {
    //                 // Xử lý phản hồi từ máy chủ sau khi đặt hàng thành công
    //                 alert('Đặt hàng thành công!');
    //             },
    //             error: function(xhr, status, error) {
    //                 // Xử lý lỗi nếu có
    //                 console.error('Đã xảy ra lỗi khi đặt hàng:', error);
    //             }
    //         });
    //     } else {
    //         // Nếu người dùng chưa đăng nhập, hiển thị thông báo và yêu cầu họ đăng nhập
    //         alert('Vui lòng đăng nhập để tiếp tục mua hàng.');
    //         // Bạn có thể chuyển hướng người dùng đến trang đăng nhập ở đây
    //         // window.location.href = '/login';
    //     }
    // });
    

function formatCurrency(value) {
    var formattedValue = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
    return formattedValue.replace(/\u200B|\u20AB/g, '').replace(/\s/g, ''); 
}

})(jQuery);
