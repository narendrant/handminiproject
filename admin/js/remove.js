// $("#remove").on("click",function(){
//    var pid=$(this).val();
// 	$.ajax({
// 		type:'post',
// 		url:'remove.php',
// 		data: 'pid='+pid,
// 		success: function(data)
// 		{
// 			if(data=="deleted")
// 				alert(data);//window.location="index.php";
// 		}
// 	})
//    });

function test(pid){
   
	$.ajax({
		type:'post',
		url:'remove.php',
		data: 'pid='+pid,
		success: function(data)
		{
			if(data=="deleted")
				alert(data);//window.location="index.php";
		}
	});
}
