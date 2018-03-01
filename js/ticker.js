$(document).ready(function() {

    var newsNum = $(".newsTicker li").length;
    console.log(newsNum);

    var totalNewsWidth = 0;

    for (var i = 0; i < newsNum; i++) {
        var newsWidth = $(".newsTicker li").eq(i).outerWidth(true);
        totalNewsWidth += newsWidth;
    }
    console.log(totalNewsWidth);
    $(".newsTicker").css('width', totalNewsWidth + 'px');

    animateNews();

    var speed = .09;

    function animateNews() {
        $(".newsTicker li").eq(0).animate({
                'marginLeft': '-=' + speed + 'px'
            }, 1, function()

            {
                // console.log("hi");
                var animateNewsWidth = $(this).outerWidth(true);
                if (speed >= animateNewsWidth) {
                    $(this).parent().append($(this));
                    $(this).removeAttr('style');
                }
                animateInterval = setTimeout(function() {
                    animateNews();
                });

            });
    }

    //     $(".newsTicker").hover(function()
    //    {
    //         clearTimeout(animateInterval);
    //         $(".newsTicker li").eq(0).stop();
    //     },function(){
    //         animateNews();
    //     });

    $("#pause").click(function() {

        $("#newsTicker li").stop();

    });
    $("#start").click(function() {

        animateNews();

    });
});