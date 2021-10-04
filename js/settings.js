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
        $('#sectorEditBox').fadeOut(50, function(){
            $('#sectorBox').fadeIn();
        });
    }

    var deleteSector = function(){
        var sectorID = this.getAttribute('sector_id');
        if ( !isNaN( sectorID ) ) {
            $.ajax({
                url: 'private/controller/c_settings.php',
                type: 'post',  
                dataType: 'json',
                data: {deleteSector: 1, sectorID: sectorID },
                    success:function(result){
                        console.log(result);
                        var $sBox = $('#sectorBox');
                        $sBox.find('input[sector_id="'+sectorID+'"]').remove();
                        NOX.NAV.removeSector(sectorID);
                        NOX.UTIL.fadeSwap($('#sectorEditBox'), $sBox);
                    },
                    error: function(xhr, status, error) {},
                    complete: function(){}
            });
        }
    }

    var editSectorClick = function(){ editSector( this.getAttribute('sector_id') ) }
    var editSector = function( sectorID ){
        var $sBox = $('#sectorBox');
        $sBox.find('input').prop('disabled',true);
        $sBox.fadeOut(50, function(){
            $.ajax({
                url: 'private/controller/c_settings.php',
                type: 'post',  
                dataType: 'json',
                data: {loadSector: 1, sectorID: sectorID },
                    success:function(result){
                        console.log(result);
                        var $eBox = $('#sectorEditBox');
                        $eBox.fadeIn(50);
                        $eBox.find('#secTitle').val( result.data[0].title );
                        $eBox.find('#sectorDeleteBtn').attr('sector_id', result.data[0].sector_id);
                    },
                    error: function(xhr, status, error) {
                        //var err = JSON.parse(xhr.responseText);
                        //alert(err.Message);
                    },
                    complete: function(){
                        $sBox.find('input').prop('disabled',false);
                    }
            });
        });
    }

    return {
        addSector: addSector,
        cancelEdit: cancelEdit,
        deleteSector: deleteSector,
        editSectorClick: editSectorClick,
        init: function(){
            // initialiZe listeners
            $(document).on('keyup', '#addSector', NOX.SETTINGS.addSector);
            $(document).on('click', '.button-sector', NOX.SETTINGS.editSectorClick);
            $(document).on('click', '#sectorCancelBtn', NOX.SETTINGS.cancelEdit);
            $(document).on('click', '#sectorDeleteBtn', NOX.SETTINGS.deleteSector);
        }
    }
})();