
$(document).ready(function () {
    $('#search').click(function () {
        $(".load_btn").css("display", "none");

        // $("#lod_less_btn").css("display", "flex");
        // $("#lod_less_btn").css("display","flex-wrep");



        var checker = 0;
        for (var i = 0; i <= 100; i++) {
            var card = $("div").filter(".col-xl-3")[i];

            var title = $("h2").filter(".card-title")[i].innerText.toUpperCase();


            if (title.indexOf($("#inp").val().toUpperCase()) > -1) {
                card.style.display = 'block';
                checker++;
            }
            else {
                card.style.display = 'none';
            }
        }

    })

    // cnt = 4;
    // var ch, c = 0;
    // function div() {
    //     $('.product_box').children('div').hide()
    //     ch = $('.product_box').children('div').length;
    //     // alert(ch)
    //     for (i = 0; i < cnt; i++) {
    //         $('.product_box').children('div:eq(' + i + ')').show()

    //     }
    //     // $('.product_box').slideToggle();

    // }
    // div();
    // total_div = ch / 4;
    // total_box = Math.floor(total_div);
    // $('.load_btn').click(function () {
    //     // $('.product_box').slideDown();

    //     cnt += 4;
    //     c++;
    //     div();
    //     // alert(total_box + " + " + c)
    //     if (total_box == c) {
    //         $('.load_btn').fadeOut(500);
    //     }
    // })
    // $('.less_btn').click(function () {
    //     cnt -= 4;
    //     // showDivs();
    //     // c--;
    //     if (cnt <= 4) {
    //         $('.less_btn').fadeOut(500);
    //     }
    // });
// more success code--------------------------------------------------
// var ch = $('.product_box').children('div').length;
// var cnt = 4;

// function showDivs() {
//     $('.product_box').children('div').hide();
//     for (i = 0; i < cnt; i++) {
//         $('.product_box').children('div:eq(' + i + ')').show();
//     }
//     if (cnt <= 4) {
//         $('.product_box').children('div:lt(4)').show();
//     } else {
//         $('.load_btn').show();
//     }
// }

// showDivs();

// $('.load_btn').click(function () {
//     if (cnt < ch) {
//         cnt += 4;
//         showDivs();
//         if (cnt >= ch) {
//             $('.load_btn').fadeOut(500);
//             // $('.load_btn').hide();

//         }
//         // else{
//         //     $('.load_btn').hide();

//         // }
//         $('.less_btn').fadeIn(500);
//     }
// });

// $('.less_btn').click(function () {
//     if (cnt > 4) {
//         cnt -= 4;
//         showDivs();
//         if (cnt <= 4) {
//             $('.less_btn').fadeOut(500);
//         }
//         // else{
//         //     $('.less_btn').hide();

//         // }
//         $('.load_btn').fadeIn(500);
//     }
// });

// if (ch <= 4) {
//     $('.load_btn').hide();
//     $('.less_btn').hide();
// }


var ch = $('.product_box').children('div').length;
var cnt = 4;

function showDivs() {
    $('.product_box').children('div').hide();
    for (i = 0; i < cnt; i++) {
        $('.product_box').children('div:eq(' + i + ')').show();
    }
    if (cnt <= 4) {
        $('.product_box').children('div:lt(4)').show();
    } else {
        $('.load_btn').show();
    }
}

showDivs();

$('.load_btn').click(function () {
    if (cnt < ch) {
        cnt += 4;
        showDivs();
        if (cnt >= ch) {
            $('.load_btn').fadeOut(500);
        }
        $('.less_btn').fadeIn(500);
    }
});

$('.less_btn').click(function () {
    if (cnt > 4) {
        cnt -= 4;
        showDivs();
        if (cnt <= 4) {
            $('.less_btn').fadeOut(500);
        }
        $('.load_btn').fadeIn(500);
    }
});

if (ch <= 4) {
    $('.load_btn').hide();
    $('.less_btn').hide();
} else {
    $('.less_btn').hide();
}

 




})