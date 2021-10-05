NOX.GRUB = (function(){
    return {
        init: function(){
            $('.tagsinput').tagsInput({
                autocomplete: {source:['Beef','Rice','Pork','NUHFING','Bread']}
            });
        }
    }
})();