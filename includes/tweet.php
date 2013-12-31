<?php
ini_set('display_errors', 1);
require_once('includes/twitterapi_call.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "522761495-BOe1b5SbXCjzuocToYDDt8pIoEuhQh05YpIJ09at",
    'oauth_access_token_secret' => "98BIwr32bre8Qi4KjdEoqNApg5iUg6fe37SuUaO0es",
    'consumer_key' => "vMF98tjfOyDnlX9cOCA",
    'consumer_secret' => "qIZ5xYuSi31KWqLZfMckA5GDGZvHq453tYLTqvzmHR0"
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
             
//var_dump(json_decode($json));

$twitter_feed = json_decode($json, true);

//var_dump($twitter_feed);

echo $twitter_feed[0]['text'];


?>

