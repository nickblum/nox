// initialize NOX onload
$(function(){ NOX.init(); });

var NOX = ( function(){

  return {

    init: function(){
      
      // initialize sub modules...
      NOX.NAV.init();
      NOX.POLY.init();

    }
  }
})();

/*
* Handle menu and navigation stuff
*/
NOX.NAV = ( function(){
  var $hamburger;
  var $navdsp;
  var $main;

  var load = function( el, label ){
    $.ajax({
      url: 'private/view/'+el.getAttribute('page'),
      type: 'post',  
      dataType: 'json',
      data: {sector_id: ( el.hasAttribute('sector_id') ? el.getAttribute('sector_id') : -1 )  },
          success:function(result){
              console.log(result);
              $main.empty();
              $main[0].insertAdjacentHTML('afterbegin', result.data);
              $navdsp.html( label );
          },
          error:function(){ alert('KABOOOOM!!'); }
      });
  }

  return {
    init: function(){
      $main = $('#main')
      $hamburger = $('#hamburger');
      $navdsp = $('#navdsp');

      // Add event listeners
      // need to clean this up, change to .on( '', myFunction ); syntax
      $('.navrad').on('click', function(){
        $hamburger.prop('checked','false').trigger('click');
        load( this, this.nextSibling.innerHTML );
      });
      
      // load homestead/dashboard on init
      $( '.navrad:eq(3)' ).trigger('click');
    }
  }
})();



NOX.POLY = ( function(){

  return {

    init: function(){
      $(document).on('click', '.polymap, .polymap-active', function() {
        $poly = $( this );
        $('#bedBox').fadeToggle(100, function(){
          $poly.attr( 'class', ( $(this).is(':visible') ? 'polymap-active' : 'polymap' ) );
          $('.polymap-active').not($poly).attr('class','polymap');
          $(this).focus();
        });  
        
        //$('#bedBox').toggle();
          //$( this ).attr( 'class', ( $(element).is(':visible') ? 'polymap-active' : 'polymap' ) );
      });
    }
  }
})();

NOX.SETTING = ( function(){

  var editSector = function( btn ){
    //alert( btn.getAttribute("sector_id") );

    
  }

  return {
    editSector: editSector,
    init: function(){
      
      
    }
  }
})();


/*
function waterTest(btn){
    var timer = 5;
    var btnVal = $(btn).val();

    var waterTimer = setInterval(function () {
          $( btn ).val( timer )

          if (--timer < 0) {
              $(btn).val(btnVal);
              clearInterval(waterTimer);
          }
    }, 1000);
   
    $.ajax( 'call_py.php',{
          success: function(data) {},
          error: function() {
            alert('There was some error performing the AJAX call!');
          }
      }
    );
}

function showBedData(el){
  var bedid = el.getAttribute('bedid');
  //alert(bedid);
  $('#bedBox').fadeToggle(100);
  $( '.polymap-active' ).attr('class','polymap');
  $( el ).attr('class','polymap-active');
}
function showScheduler(){
  alert('No can do, sucka!');
}
function editBed(){
  alert('AHAHAHAHAHAHAHA!');
}
*/