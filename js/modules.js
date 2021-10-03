// initialize NOX onload
$(function(){ NOX.init(); });

var NOX = ( function(){

  return {

    init: function(){
      
      // initialize sub modules...
      NOX.NAV.init();
      NOX.POLY.init();
      NOX.SETTINGS.init();
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
  var $menuBox;

  var load = function(){
    var el = this; // calling radio

    // collapse menu
    $hamburger.prop('checked','false').trigger('click');

    // load page
    $.ajax({
      url: 'private/view/'+el.getAttribute('page'),
      type: 'post',  
      dataType: 'json',
      data: {sector_id: ( el.hasAttribute('sector_id') ? el.getAttribute('sector_id') : -1 )  },
          success:function(result){
              console.log(result);
              $main.empty();
              $main[0].insertAdjacentHTML('afterbegin', result.data);
              $navdsp.html( el.nextSibling.innerHTML );
          },
          error:function(){ alert('KABOOOOM!!'); }
      });
  }

  // Dynamically add another menu item in the "sector" group -- probably called from settings.js
  var insertSector = function(title, sectorID){
    $lastNav = $('.subitem').last().parent();
    $newNav = $lastNav.clone();
    $newNav.find('input').attr('sector_id',sectorID);
    $newNav.find('span').html(title);
    $newNav.find('.navrad').on('click',load);
    $lastNav.after($newNav);
  }

  return {
    insertSector:insertSector,
    init: function(){
      $main = $('#main')
      $hamburger = $('#hamburger');
      $navdsp = $('#navdsp');
      $menuBox = $('#menuToggle');

      // add listeners
      $('.navrad').on('click',load);

      // collapse nav menu when click outside
      $(document).click(function(e) {
        if (!$(e.target).is($menuBox) && !$menuBox.has(e.target).length ) {
          $hamburger.prop('checked','false').trigger('click');
        } 
      });
      
      // load homestead/dashboard on init
      $( '.navrad' ).eq(-2).trigger('click');
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