import { data_img_slider } from "./data.js";

$(document).ready(function () {
    for (let item of data_img_slider) {
        $("#list-slider-item").append(`<div class="slider-item opacity"><img src="${item.img}" alt="${item.title}"></div>`)
    }

    // button next and previous
    $(".left, .right").hover(
        function () {
            $(this).addClass("active");
        },
        function () {
            $(this).removeClass("active");
        }
    )

    // click vào thumb hiện lên slider-show
    $(".slider-item").click(function () {
        // acitve
        $(".slider-item").addClass("opacity");
        $(this).removeClass("opacity");

        let img = $(this).children("img");
        let img_url = img.attr("src");
        $("#slider-show").children("img").attr("src", img_url);
    })

    // button next and prev event
    //  next
    $(".right").click(function () {
        //   xác định item có không có class opacity
        //   nhảy qua phần tử kế tiếp
        //   nếu phần tử kế tiếp không tồn tại, quay lại ban đầu
        let currentItem = $(".slider-item").not(".opacity");
        let nextItem = currentItem.next(".slider-item");
        if(currentItem.is(".slider-item:last-child")){
            $(".slider-item").eq(0).click();
        } else {
            nextItem.click();
        }
        console.log((nextItem))
    });
    $(".left").click(function () {
        //   xác định item có không có class opacity
        //   nhảy lùi lại
        //   nếu phần tử kế tiếp không tồn tại, quay lại ban đầu
        let currentItem = $(".slider-item").not(".opacity");
        let prevItem = currentItem.prev(".slider-item");
        if(currentItem.is(".slider-item:first-child")){
            $(".slider-item:last-child").click();
        } else {
            prevItem.click();
        }
        console.log((prevItem))
    })

    // mặc định
    $(".slider-item").eq(0).click()

})