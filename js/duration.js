NOX.DURATION = (function(){
    var $lastInpt = null;
    return {
        init: function(){
            $('.duration-box').each(function(){
                $box = $(this);
                $inputs = $box.find('input[type="text"]');
                $box.$lastFocus = $inputs.last();
                $inputs.on('click',function(){
                    $( this ).select();
                    $box.$lastFocus = $(this)
                });
                $(this).find('input[type="button"]').on('click',function(){
                    
                    $box.$lastFocus.val(parseInt($box.$lastFocus.val(),10)+parseInt($box.$lastFocus.attr('increment'),10));
                });
            });
        }
    }
})();