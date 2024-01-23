$(document).ready(function () {
    $("#page").before("<div class='back'></div>");
    const banner = $("<div id='banner'></div>");
    $(".back").prepend(banner);

    const title = data.site_title;
    const stylesheetName = data.stylesheet_name;

    let text = data.pre_site_title + ' - ' + title + '. ' + data.pre_stylesheet_name + ' - ' + stylesheetName;

    let bannerElem = $("<p></p>").text(text);
    $("#banner").append(bannerElem);
});

$(document).scroll(function () {
    let lastPosition = $(window).scrollTop();
    if (lastPosition < $("header").offset().top) {
        $(".back").fadeIn(500).show();
    } else {
        $(".back").hide();
    }
});
