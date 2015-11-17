$(document).ready(function () {
    $('.kop').on('click', function (e) {
        removeActive(this);
        makeActive(this);
    });

    function makeActive(item) {
        if($(item).find('> a').hasClass('active')) {
            $(item).find('> a').removeClass("active");
            $(item).find('ul').slideUp("slow");
        } else {
            $(item).find('> a').addClass("active");
            $(item).find('ul').slideDown("slow");
        }
    }

    function removeActive(item) {
        var element = '.kop';
        $(element).not(item).find('> a').removeClass("active");
        $(element).not(item).find('ul').slideUp("slow");
    }
});

/* confirm delete */
function confirm_delete()
{
    return confirm("Are you sure you want to delete this?");
}