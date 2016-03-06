$(document).ready(function(){
  $('#message').hide();
  $('.modal-trigger').leanModal();
	$( "#submit" ).on('click',function (event) { 
           $.ajax({
            type: 'post',
            url: 'editprod2.php',
            data: $('#editform').serialize(),
            success: function (data) {
              if(data=="success"){
                console.log((data));
                $('#success').openModal();
                $('#message').fadeIn(100);
              }else{
                $('#success').openModal();
              $('#cerror').html(data);
              }
            }
          });
        event.preventDefault();
	});
$('#done').on('click',function(){

   window.location='myaccount.php';

});
});