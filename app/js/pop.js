$('.vright table').tooltip({ 

    track: true, 
    delay: 0, 
    showURL: false, 
    showBody: " - ", 
    fade: 250 

});
	
	
$(document).ready(function(){
		   
   $('a#LinkPopulateCourseId').bind('click',function(){

   		var courseid = $(this).data('each');
		sessionStorage.setItem('ctid',courseid);
		$('div#DialogUpdateResult').css({'display':'block'});   
	   	
	});

   $('button#btnUpdateResultForm').bind('click',function(e){

   		e.preventDefault();

   		var Formdata =$('form#UpdateResultForm').serialize();
   		var url = $('form#UpdateResultForm').attr('action');
   		var courseid = sessionStorage.getItem('ctid');

   		$('form#UpdateResultForm p#feedback').empty().html('<small>Updating...</small>');
   		
   		var courseData = {'courseid':courseid};
   		
   		Formdata = Formdata+'&'+$.param(courseData);

   		$.post(url,Formdata,function(response){
   			
   			if(response == 'ok'){

   				window.location='compeach.php';

   			}else if(response == 'bad'){

   				$('form#UpdateResultForm p#feedback').empty();
   				alert("Summation of Number Entered must not be Greater Than 100");

   			}else{

   				alert("Server Error Retry!");
				window.location="compeach.php";
   			}

   		});
   });

});
