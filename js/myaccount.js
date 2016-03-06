$(document).ready(function(){

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
$('.approve1').on('click',function(){
  var tid=$(this).val();
  $.ajax({
    type: "POST",
    url: "rentee_approval.php",
    data: 'tid='+tid,
    success: function(data){
              if (data==='success') {
                $('#success').openModal();
                $('#ok1').on('click',function(){ window.location="myaccount.php";});
              }
    }
  });
});

$('.complaint').on('click',function(){
  var tid=$(this).val();
  $('#complaint').openModal();
  $('#complaintsub').on('click',function(e){
           $.ajax({
            type: 'post',
            url: 'complaint.php',
            data: $('#complaintform').serialize()+'&tid='+tid,
            success: function (data) {
              if(data=="success"){
                console.log((data));
                window.location="myaccount.php";
                // alert();
              }else{
              $('#comerror').html(data);                
              }
            }
          });


  e.preventDefault();
  });
});

$('.review').on('click',function(){
  var pid=$(this).val();
  $('#review').openModal();
  $('#reviewsub').on('click',function(e){
           $.ajax({
            type: 'post',
            url: 'review.php',
            data: $('#reviewform').serialize()+'&pid='+pid,
            success: function (data) {
              if(data=="success"){
                console.log((data));
                window.location="product.php?pid="+pid;
                // alert();
              }else{
              $('#cerror').html(data);                
              }
            }
          });


  e.preventDefault();
  });
});
$('.delete').on('click',function(){
  var pid=$(this).val();
  $('#confirm').openModal();
  $('#no').on('click',function(){
    $('#confirm').closeModal();});    
  $('#yes').on('click',function(){
          $.ajax({
            type: 'post',
            url: 'remove.php',
            data: 'pid='+pid,
            success: function (data) {
              if(data=="deleted"){
                console.log((data));
                window.location="myaccount.php";
              }else{
              $('#derror').html(data);                
              }
            }
          });
          });
});
$('.approve').on('click',function(){
  var tid=$(this).val();
  $.ajax({
    type: "POST",
    url: "renter_approval.php",
    data: 'tid='+tid,
    success: function(data){
              if (data==='returned') {
                $('#success1').openModal();
                $('#ok3').on('click',function(){ window.location="myaccount.php";});
              }
    }
  });
});
$('.return').on('click',function(){
  var tid=$(this).val();
  $.ajax({
    type: "POST",
    url: "return.php",
    data: 'tid='+tid,
    success: function(data){
              if (data==='returned') {
                $('#returned').openModal();
                $('#ok5').on('click',function(){ window.location="myaccount.php";});
              }
    }
  });
});
$('.reject').on('click',function(){
  var tid=$(this).val();
  $.ajax({
    type: "POST",
    url: "renter_reject.php",
    data: 'tid='+tid,
    success: function(data){
              if (data==='complaint') {
                $('#rejectmodal').openModal();
                $('#ok4').on('click',function(){ window.location="myaccount.php";});}
    }
  });
});
$('.reject1').on('click',function(){
  var tid=$(this).val();
  $.ajax({
    type: "POST",
    url: "rentee_cancel.php",
    data: 'tid='+tid,
    success: function(data){
              if (data==='cancelled') {
                $('#cancel').openModal();
                $('#ok2').on('click',function(){ window.location="myaccount.php";});}
    }
  });
});
$('.request').on('click',function(){alert($(this).val());});

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

