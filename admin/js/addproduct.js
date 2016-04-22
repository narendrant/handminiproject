$(document).ready(function(){
$('#bigload').hide();
$('#smallload').hide();

 $('select').material_select();
    $('.button-collapse').sideNav();

    $('.dropdown-button1').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true // Displays dropdown below the button
    }

  );
    $('.dropdown-button2').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true // Displays dropdown below the button
    }

  );

      $('.modal-trigger').leanModal();

$('#processingBut').on('click',function(){
$('.terms').hide();
//$('#bigload').fadeIn(100);
//$('#smallload').fadeIn(100);
$('#prodform').submit();


  });
});
  function logout(){

           $.ajax({
            type: 'post',
            url: 'logout.php',
            success: function (data) {
                window.location="index.php"
              }
            });
  }

