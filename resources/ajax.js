$( document ).ready(function() {

toto();

});




function toto()
{


  $.getJSON( "./server.php", function( data ) {
    var items = [];

    $.each( data, function( key, val ) {
      console.log(key, val.pos);

      $('.case_'+val.pos.x+'_'+val.pos.y).addClass('v').click(function( event ) {
          console.log(event);
      });

    });
  });

}
