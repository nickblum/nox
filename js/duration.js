(function( $ ) {
    $.fn.durationjs = function( settings ) {
        var settings = $.extend({
            display: 'dhm', // days hours & minues by default
            sInc: 10,
            mInc: 1,
            hInc: 1,
            dInc: 1,
            initVal: 0, // SECONDS -- EVERYTHING IS SECONDS! (for now, I guess)
        }, settings );
        
        var tUnits = {
            s: { dsp: "Sec", inc: settings.sInc, val: 0, max: 60, rate: 1}, // default save value in seconds, 1 = 1
            m: { dsp: "Min", inc: settings.mInc, val: 0, max: 60, rate: 60},// 60 secs per min, ...
            h: { dsp: "Hrs", inc: settings.hInc, val: 0, max: 24, rate: 3600},
            d: { dsp: "Day", inc: settings.dInc, val: 0, max: 365, rate: 86400}
        }

        // Calculate initialiation values

        // Build the HTML inputs
        $box = $('<div class="duration-box">');
        let inputTypes = settings.display.split("");
        inputTypes.forEach(function (unit) {
            let inputVal = (tUnits[unit].val).toString().padStart(2,'0');
            let $input = $('<input type="text" class="duration duration-val">').val(inputVal);
            let $label = $('<label class="duration">').html( tUnits[unit].dsp )
            $box.append( $input, $label );
        });
        var $btnUp = $( '<input type="button" class="duration duration-updown material-icons" value="arrow_upward">' );
        var $btnDown = $( '<input type="button" class="duration duration-updown material-icons" value="arrow_downward">' );
        $box.append($btnUp,$btnDown);
        $box.$lastInput = $box.find('.duration-val').last();
        
        // Add listeners


        this.append( $box );
    };
 
}( jQuery ));