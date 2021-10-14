NOX.GRUB = (function(){
    var $omniBox;
    var url = 'private/controller/c_grub.php';

    var addRecipe = function(tag){
        $input = $omniBox.find( '#grubOmni_tag' );
        $tags = $omniBox.find( '.tag-text' );

        if( $input.val() || $tags.length ){
            var recipeTitle = '';
            $tags.each(function(){ recipeTitle += this.innerHTML + ' ' });
            recipeTitle += $input.val();

            // disable button
            $omniBox.find('input').prop('disabled',true);
            
            $.ajax({ url: url, type: 'post',  dataType: 'json',
                data: {addRecipe: 1, title: recipeTitle },
                    success:function(result){
                        console.log(result);
                        loadRecipe(result.recipe_id,true);
                    },
                    error: function(xhr, status, error) {},
                    complete: function(){
                        $omniBox.find('input').prop('disabled',false);
                    }
            });
        }
        
    }
    var cancelEdit = function(){
        NOX.UTIL.fadeSwap($('#grubEditBox'),$('#grubBox'));
        getRecipeList();
    }
    var deleteRecipe = function(){        
        var recipeID = this.getAttribute('recipe_id');
        if ( !isNaN( recipeID ) ) {
            $.ajax({ url: url, type: 'post',  dataType: 'json',
                data: {deleteRecipe: 1, recipeID: recipeID },
                    success:function(result){
                        console.log(result);
                        getRecipeList();
                        NOX.UTIL.fadeSwap($('#grubEditBox'),$('#grubBox'));
                    },
                    error: function(xhr, status, error) {},
                    complete: function(){}
            });
        }
    }
    var getRecipeList = function(){
        $.ajax({ url: url, type: 'post',  dataType: 'json',
            data: {getRecipes: 1, tags: '' },
                success:function(result){
                    console.log(result);
                    
                    var $recipeBox = $('#grubRecipeBox');
                    $recipeBox.empty();
                    for ( var i = 0; i < result.data.length; i++ ) {
                        //console.log(result.data[i].title);
                        $recipeBox.append( 
                            $('<div class="result-box" onclick="NOX.GRUB.loadRecipe('+ result.data[i].recipe_id +');">')
                                .html( result.data[i].title ) 
                                .attr('recipe_id', result.data[i].recipe_id)
                        );
                    }
                    $recipeBox.fadeIn(50);
                },
                error: function(xhr, status, error) {},
                complete: function(){
                    $omniBox.find('input').prop('disabled',false);
                }
        });
    }
    var loadRecipe = function(recipeID,editMode){
        if( !isNaN(recipeID) ){
            $.ajax({ url: url, type: 'post',  dataType: 'json',
                data: {loadRecipe: 1, recipeID: recipeID },
                    success:function(result){
                        console.log(result);
                        var $eBox = $('#grubEditBox');
                        $eBox.find('#recipeTitle').val(result.data[0].title);
                        NOX.UTIL.fadeSwap($('#grubBox'),$eBox);
                        $eBox.find('#grubDeleteBtn').attr('recipe_id', result.data[0].recipe_id);
                    },
                    error: function(xhr, status, error) {},
                    complete: function(){
                        $omniBox.find('input').prop('disabled',false);
                    }
            });
        }
        
        /*

                       
        */
    }
    var updateSearch = function(){
        /*
        $omniBox.find('.tag-text').each(function(){
            console.log( this.innerHTML );
        });*/
        console.log('add/remove tag');
    }
    
    return {
        addRecipe:addRecipe,
        cancelEdit:cancelEdit,
        deleteRecipe:deleteRecipe,
        loadRecipe:loadRecipe,
        updateSearch:updateSearch,
        init: function(){
            // build recipe list
            getRecipeList();

            // setup autocomplete
            $omniBox = $('#grubOmniBox');
            $omniBox.find('.tagsinput').tagsInput({
                autocomplete: {source:['Beef','Rice','Pork','NUHFING','Bread']},
                onAddTag: NOX.GRUB.updateSearch,
                onRemoveTag: NOX.GRUB.updateSearch
            });

            // add event listeners
            $('#grubOmniAdd').on('click', NOX.GRUB.addRecipe);
            $('#grubCancelBtn').on('click',NOX.GRUB.cancelEdit);
            $('#grubDeleteBtn').on('click',NOX.GRUB.deleteRecipe);

            //NOX.DURATION.init();
            $('#grubPrepTime').durationjs();
            $('#grubCookTime').durationjs();
            $('#grubSchedTime').durationjs();
        }
    }
})();