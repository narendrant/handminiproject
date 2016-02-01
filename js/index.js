$(document).ready(function(){
    $('.button-collapse').sideNav();

    $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true // Displays dropdown below the button
    }

  );


	    $('.modal-trigger').leanModal();

	$( "#loginform" ).submit(function (event) { 
           $.ajax({
            type: 'post',
            url: 'login.php',
            data: $('#loginform').serialize(),
            success: function (data) {
              if(data=="loggedin"){
                console.log((data));
                window.location="index.php"
              }else{
              $('#error').html(data);
              }
            }
          });
        event.preventDefault();
	});
$('#signupform').ajaxForm({                 
            data: $('#signupform').serialize(),
            success: function (data) {
              if(data=="signedup"){
                console.log((data));
                window.location="index.php"
              }
              $('#serror').html(data);
            }
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
