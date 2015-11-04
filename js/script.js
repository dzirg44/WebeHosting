/* dashboard 
   index*/
$(document).ready(function () {
    $(".dashboard").click(function () {
        $(".index-databases-subdown").slideUp("slow");
        $(".index-databases-kopdownn").removeClass("active");
        $(".index-email-subdown").slideUp("slow");
        $(".index-email-kopdownn").removeClass("active");
        $(".dashboard").addClass("active");
    });
});

/* dropdown email */
$(document).ready(function () {
    $(".index-email-kopdown").click(function () {
        $(".index-email-subdown").slideToggle("slow");
        $(".index-email-kopdownn").addClass("active");
        $(".index-databases-subdown").slideUp("slow");
        $(".index-databases-kopdownn").removeClass("active");
        $(".dashboard").removeClass("active");
    });
});

/* dropdown databases */
$(document).ready(function () {
    $(".index-databases-kopdown").click(function () {
        $(".index-databases-subdown").slideToggle("slow");
        $(".index-databases-kopdownn").addClass("active");
        $(".index-email-subdown").slideUp("slow");
        $(".index-email-kopdownn").removeClass("active");
        $(".dashboard").removeClass("active");
    });
});

/* whene click dashboard gets active */
$(document).ready(function () {
    $(".content").click(function () {
        $(".index-email-subdown").slideUp("slow");
        $(".index-databases-subdown").slideUp("slow");
        $(".index-email-kopdownn").removeClass("active");
        $(".index-databases-kopdownn").removeClass("active");
        $(".dashboard").addClass("active");
    });
});

/* tabs 
   autoresponders */
$(document).ready(function () {
    $(".tabs-menu a").click(function (event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});

/* email submenu open when page reload */
$(document).ready(function () {
    $(".auto-email-subdown").slideToggle("slow")
    $(".auto-email-kopdown").click(function () {
        $(".auto-email-subdown").slideToggle("slow");
        $(".auto-email-kopdownn").addClass("active");
        $(".auto-databases-subdown").slideUp("slow");
        $(".auto-databases-kopdownn").removeClass("active");
    });
});

/* dropdown databases */
$(document).ready(function () {
    $(".auto-databases-kopdown").click(function () {
        $(".auto-databases-subdown").slideToggle("slow");
        $(".auto-databases-kopdownn").addClass("active");
        $(".auto-email-subdown").slideUp("slow");
        $(".auto-email-kopdownn").removeClass("active");
    });
});

/* whene click email opens */
$(document).ready(function () {
    $(".content").click(function () {
        $(".auto-email-subdown").slideDown("slow");
        $(".auto-databases-subdown").slideUp("slow");
        $(".auto-email-kopdownn").addClass("active");
        $(".auto-databases-kopdownn").removeClass("active");
    });
});