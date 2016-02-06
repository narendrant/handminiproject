$(document).ready(function(){
 var ismob=false;
 $('#locmob').on('click',function(){
  ismob=true;
 });
  var location='LOCATION';

  $('.location').on('click',function(){
    location=$(this).html();
    if(location=='Other')
      location="LOCATION";
    $('#loc').empty();    
    //alert(location);
    $('#loc').html(location);
    if(ismob){
      Materialize.toast(""+location,4000);
      ismob=false;
    }
  });

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
  $( "#loginform1" ).submit(function (event) { 
           $.ajax({
            type: 'post',
            url: 'login.php',
            data: $('#loginform1').serialize(),
            success: function (data) {
              if(data=="loggedin"){
                console.log((data));
                window.location="index.php"
              }else{
              $('#error1').html(data);
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
$('#signupform1').ajaxForm({                 
            data: $('#signupform').serialize(),
            success: function (data) {
              if(data=="signedup"){
                console.log((data));
                window.location="index.php"
              }
              $('#serror1').html(data);
            }
          });

function fill(Value)
{
$('#keyword').val(Value);
}

$("#keyword").keyup(function(e) {
if(e.keyCode===13){
  var name = $('#keyword').val();
  window.location="search.php?keyword="+name+"&loc="+location;
}  
var name = $('#keyword').val();
if(name=="")
{
$("#display").html("");
}
else
{
$.ajax({
type: "POST",
url: "searchloc.php",
data: 'keyword='+ name +'&loc='+ location,
success: function(html){
//alert(location);
$("#display").empty();
$("#display").append(html);
}
});
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

