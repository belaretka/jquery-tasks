console.log('script.js loaded');
// task 4 - sidebar
$(document).ready(function () {
    $('ul.dropdown-menu').hide();
    $('div#menu-list ul li.dropdown.has_child a')
        .off()
        .css({cursor: "pointer"})
        .on('click',
        function (e) {
            e.preventDefault();
            $(this).next('ul').toggle('show');
        });
    $('div#menu-list ul li.dropdown.has_child ul li.item').click(function () {
        document.location.href = $(this).children('a').attr('href');
    });
});
