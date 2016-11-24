(function($){

$('.search-icon').click(function(){
        $('.search-field').animate({width: 'toggle'},500, function(){
            $(this).focus();
        });
});

})(jQuery);