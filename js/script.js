
/*

Active Menu Item


*/

/*

Responsive SlideShow

*/
  $(function() {
    $(".rslides").responsiveSlides();
     $('#simple-menu').sidr();

     $( "#simple-menu" ).click(function() {
		$("#sidr-button").toggleClass("pull-left");
	  });
  });


$('.sticky-menu').waypoint('sticky');


/*

Conditions Diagram / Services

*/

//TOOLTIPS

$('#anatomy-1').tooltip();
$('#anatomy-2').tooltip();
$('#anatomy-3').tooltip();
$('#anatomy-4').tooltip();
$('#anatomy-5').tooltip();
$('#anatomy-6').tooltip();
$('#anatomy-7').tooltip();


//GETTING SERVICES 

function getServices()
{

   $("#services_link").click(function(event){
   		event.preventDefault();
    	$.ajax({url:"../includes/elements/services.php",success:function(result){
      $(".c_and_s_inner").html(result);
  	  }});
 	 });
}

getServices();

//GETTING CONDITIONS  

function getCondition(div, link)
{

   $(div).click(function(){
    	$.ajax({url:link,success:function(result){
      $("#conditions_inner").html(result);
  	  }});
 	 });
}


var head = "../includes/conditions/head.php";
var neck = "../includes/conditions/neck.php";
var chest = "../includes/conditions/chest.php";
var stomach = "../includes/conditions/stomach.php";
var repro = "../includes/conditions/reproductive.php";
var knee = "../includes/conditions/knee.php";

getCondition("#anatomy-1", head);
getCondition("#anatomy-2", neck);
getCondition("#anatomy-3", chest);
getCondition("#anatomy-4", stomach);
getCondition("#anatomy-5", repro);
getCondition("#anatomy-6", knee);

/*

Conditions Diagram / Services

*/

$("#submit-button").click(function(){

 	name = $('#name').val();
 	console.log(name);
	email = $('#email').val();
	console.log(email);
	message = $('#message').val();
	console.log(message);

	if (name == "" || email == "" || message == "")
	{
		$('#error_modal').modal();
	}
	else
	{	

		$.ajax({
				type: "POST",
				url: "./mailto.php",
				data:{
					name: name,
					email: email,
					message: message
				}

			}).done(function(msg) {

			if (msg == "sent")
				{
				$("#contact_div").html('<div class="well"><hh1>Thank you. Your message has been sent.</h1></div>');
				}
				else
				{
				$("#contact_div").html('<div class="alert alert-danger"><h2>Sorry, your message wasn\'t sent due to a connection error. You can contact me directly at info@info.com.</h2></div>');
				}
			}).error(function(msg){

				console.log(msg);
				$("#contact_div").html('<div class="alert alert-danger"><h2>Sorry, your message wasn\'t sent due to a connection error. You can contact me directly at info@info.com.</h2></div>');
			}); 

	}

});