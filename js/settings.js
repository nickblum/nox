NOX.SETTINGS = ( function(){
    var addSector = function(e){
        if(e.key==='Enter' && this.value.trim().length ){
            $input = $( this );
            $input.siblings().prop('disabled',true);
            
            $.ajax({
                url: 'private/controller/c_settings.php',
                type: 'post',  
                dataType: 'json',
                data: {addSector: 1, title: $input.val() },
                    success:function(result){
                        console.log(result);
                        var $newBtn = $('<input type="button">').attr({
                            class: 'button button-sector',
                            value: $input.val(),
                            sector_id: result.sector_id
                        });
                        $newBtn.insertBefore($input);
                        NOX.NAV.insertSector($input.val(),result.sector_id);
                        $input.val('');

                        editSector(result.sector_id);
                    },
                    error: function(xhr, status, error) {
                        //var err = JSON.parse(xhr.responseText);
                        //alert(err.Message);
                    },
                    complete: function(){
                        $input.siblings().prop('disabled',false);
                    }
            });
        }
        
    }

    var cancelEdit = function(){
        $('#sectorBox').slideDown();
        $('#sectorEditBox').slideUp();
    }

    var editSectorClick = function(){ editSector( this.getAttribute('sector_id') ) }
    var editSector = function( sectorID ){
        $('#sectorBox').slideUp();
        $('#sectorEditBox').slideDown();
    }

    return {
        addSector: addSector,
        cancelEdit: cancelEdit,
        editSectorClick: editSectorClick,
        init: function(){
            // initialiZe listeners
            $(document).on('keyup', '#addSector', NOX.SETTINGS.addSector);
            $(document).on('click', '.button-sector', NOX.SETTINGS.editSectorClick);   
        }
    }
})();