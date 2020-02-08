$(document).ready(function(){
    $("#link-show-brands").click(function(){
        $("#productfrontsearch-brand_id label:not(:nth-child(-n+10))").show(500);
        $(this).hide();
        $("#link-hide-brands").show();
    });

    $("#link-hide-brands").click(function () {
        $("#productfrontsearch-brand_id label:not(:nth-child(-n+10))").hide(500);
        $("html, body").animate({ scrollTop: 260 }, "slow");
        $(this).hide();
        $("#link-show-brands").show();
    })
});