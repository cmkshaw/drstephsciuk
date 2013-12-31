<?php
ini_set('display_errors', 1);
require_once('includes/twitterapi_call.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "SECRET",
    'oauth_access_token_secret' => "SECRET",
    'consumer_key' => "SECRET",
    'consumer_secret' => "SECRET"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$requestMethod = 'POST';

/** POST fields required by the URL above. See relevant docs as above **/
$postfields = array(
    'screen_name' => 'stephsciuk', 
    'skip_status' => '1'
);

// /** Perform a POST request and echo the response **/
// $twitter = new TwitterAPIExchange($settings);
// echo $twitter->buildOauth($url, $requestMethod)
//              ->setPostfields($postfields)
//              ->performRequest();

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=stephsciuk';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
            
         $json = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
             
$twitter_feed = json_decode($json, true);

//var_dump($twitter_feed);
?>



<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- About -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Stephanie Sciuk, Doctor of Naturopathic Medicine at the Lakeside Clinic in Barrie, Ontario Canada. ">

	<!-- Social Media prefs -->
	<meta property="og:title" content="Stephanie Sciuk, Naturopathic Doctor"/>
	<meta property="og:description" content="Stephanie Sciuk, Naturopathic Doctor practicing in Barrie, Ontario at the Lakeside Clinic."/>

	<title> Stephanie Sciuk, N.D. - Naturopathic Doctor, Naturopathic Medicine, Barrie</title>

	<?php include('includes/head_links.php'); ?>

</head>
<body>

<section class="main">
	
	<?php include('includes/elements/header.php'); ?>

			<ul class="rslides">
				 
				 <li><img src="imgs/slide-2.jpg" alt=""></li>
				  <li><img src="imgs/slide-5.jpg" alt=""></li>
				  <li><img src="imgs/slide-1.jpg" alt=""></li>
				   <li><img src="imgs/slide-6.jpg" alt=""></li>
				  <!--  <li><img src="imgs/slide-8.jpg" alt=""></li>
				  <li><img src="imgs/slide-9.jpg" alt=""></li> -->
				  <li><img src="imgs/slide-10.jpg" alt=""></li>
			</ul>

</section>

<section class="inner-container">
	<div class="wrapper">
		<section class="about">
			<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="row about-wrap">
				
				
				<div class="col-xs-12 col-sm-4 col-md-3 ">
					<img src="imgs/about.jpg" style="width:224px; height:230px;" class="hidden-xs">
					<div class="tweet row hidden-xs">

					<a class="col-xs-3" href="https://twitter.com/stephsciuk"><img class="" src="imgs/twitter2.png" alt=""></a>
						<div class="tweet-wrap col-xs-9">
						<a href="https://twitter.com/stephsciuk">
						<?php 
						echo $twitter_feed[0]['text']; 
						?><br>
						<?php
						$date = $twitter_feed[0]['created_at']; 
						echo date("m/d/Y", strtotime($date));
						?>
						</a>
						</div>
					</div>
				</div>
					
						
					
				<div class="col-xs-12 col-sm-8 col-md-9">
					

					<h1 class="hdng_intro">Hello and welcome. I am a Naturopathic Doctor working in beautiful Barrie, Ontario.</h2>

					<p class="intro"> Please read on to learn a little bit about me.</h1>

					<p>As a kid growing up in “the Shwa” aka Oshawa, I spent most of my time playing on sports teams, snowboarding with friends, and hanging out with my family and beloved golden retriever.</p>

					<p>While attending Queen’s University for my undergraduate degrees, I worked as a lifeguard, competed in intramurals, and traveled to Melbourne, Australia for an academic exchange program.</p>

					<p>During my exchange in Melbourne I met a Naturopathic doctor that introduced me to a whole new way of approaching healthcare. This timely meeting sparked my passion for holistic medicine and upon my return I enrolled at the Canadian College of Naturopathic Medicine to pursue my medical degree.</p>

					<p>While at CCNM I struggled with my own digestive health issues. I sought advice from my medical doctor, specialist, and naturopathic doctor. With the help of my ND, I regained control over my symptoms and successfully healed my gut. Upon graduating from CCNM and successfully completing my licensing exams I moved to Barrie, Ontario to begin my family practice.</p>

					<p>Thanks for getting to know a little bit about me. I can’t wait to get to know you! Please call <a href="tel:+17057260923">(705) 726-0923</a> to book a free 15-minute meet and greet where we discuss how naturopathic medicine can help you achieve your healthcare goals.</p>
					
					<div class="center">
					<img src="imgs/about.jpg" style="width:224px; height:230px;" class="visible-xs">
					</div>

					<div class="well">
					Dr. Sciuk is actively engaged in educating her patients and the public about health and Naturopathic Medicine.  You can contact her for speaking engagements or publications via the <a href="contact.php">contact page</a>.
					</div>	

					


				</div>
				</div>
			</div>
		</section>
	</div>
</section>
		
<!-- Footer -->	
		<?php include('includes/elements/footer.php'); ?>
<!-- JS Files -->	
		<?php include('includes/footer_links.php'); ?>
		</body>
</html>