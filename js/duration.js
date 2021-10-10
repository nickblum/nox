(function( $ ) {
    $.fn.durationjs = function( settings ) {
        var settings = $.extend({
            display: 'dhm', // days hours & minues by default; must be sequential (i.e., no 'dms')
            sInc: 1,
            mInc: 15,
            hInc: 1,
            dInc: 1,
            initVal: 0, // SECONDS -- EVERYTHING IS SECONDS! (for now, I guess)
        }, settings );
        
        var tUnits = {
            s: { dsp: "Sec", inc: settings.sInc, val: 0, max: 59, rate: 1}, // default save value in seconds, 1 = 1
            m: { dsp: "Min", inc: settings.mInc, val: 0, max: 59, rate: 60},// 60 secs per min, ...
            h: { dsp: "Hrs", inc: settings.hInc, val: 0, max: 23, rate: 3600},
            d: { dsp: "Day", inc: settings.dInc, val: 0, max: 364, rate: 86400}
        }

        // Calculate initialiation values

        // Build the HTML inputs
        $box = $('<div class="duration-box">');
        let inputTypes = settings.display.split("");
        inputTypes.forEach(function (unit) {
            let inputVal = (tUnits[unit].val).toString().padStart(2,'0');
            let $input = $('<input type="text" class="duration duration-val">').attr('tunit',unit).val(inputVal);
            let $label = $('<label class="duration">').html( tUnits[unit].dsp )
            
            //add listeners
            $input.on('focus',function(){ this.select() });
            $input.on('keyup',function( e ){ 
                console.log( $(this).index() );

                var tunit = this.getAttribute('tunit');
                var newVal = parseInt(this.value.replace(/\D/g,''), 10);
                if ( isNaN( newVal ) ) {
                    newVal = '00';
                
                // If keypress up/down keys
                } else if ( e.which == 38 || e.which == 40 ) { 
                    // add or subtract increment
                    newVal += ( e.which == 38 ? 1 : -1 ) * tUnits[tunit].inc; 
                    if ( newVal >= tUnits[tunit].max && $(this).index() >= 2 ) {
                        newVal = '00';
                        let $nextUnit = $( this ).parent().children().eq( $(this).index() - 2 );
                        
                        /*
                            need to increment by 1
                        */
                        this.value = newVal.toString().padStart(2,0);
                        $nextUnit.select()
                        return false;
                    } else if ( newVal < 0 ) {
                        
                    }
                } 
                
                this.value = newVal.toString().padStart(2,0);
                this.select();
                // if up/down keys, increment decrement
            });
            $box.append( $input, $label );
        });
        var $btnUp = $( '<input type="button" class="duration duration-updown material-icons" value="arrow_upward">' );
        var $btnDown = $( '<input type="button" class="duration duration-updown material-icons" value="arrow_downward">' );
        $box.append($btnUp,$btnDown);
        $box.$lastInput = $box.find('.duration-val').last();
        
        // Add listeners
        $btnUp.on('click',function(){
            
            
            let val = parseInt($box.$lastInput.val());
            let increment = tUnits[($box.$lastInput.attr('tunit'))].inc;
        });

        this.append( $box );
    };
 
}( jQuery ));