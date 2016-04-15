$( document ).ready(function() {
  toto();
});

function toto()
{
  $.getJSON( "./server.php?get=ships", function( data ) {
    var items = [];
    $.each( data, function( key, val ) {

      $('.case_'+val.x+'_'+val.y).addClass('v'+val.owner).click(function( event ) {
        console.log(event.currentTarget);
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
