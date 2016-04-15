$( document ).ready(function() {
  toto();
});

function toto()
{
  $.getJSON( "./server.php?get=ships", function( data ) {
    var items = [];
    $.each( data, function( key, val ) {
      $('.case_'+val.pos.x+'_'+val.pos.y).addClass('v').click(function( event ) {
        //event
      });
    });
  });

  $.getJSON( "./server.php?get=asteroid", function( data ) {
    var items = [];
    $.each( data, function( key, val ) {
      $('.case_'+val.x+'_'+val.y).addClass('a');
    });
  });
}
