<?php
session_start();

require '../autoload.php';
require 'env.php';
use Abraham\TwitterOAuth\TwitterOAuth;

$request_token = array();
$request_token['oauth_token'] = $_SESSION['oauth_token'];
$request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];

if (isset($_REQUEST['oauth_token']) && $request_token['oauth_token'] !== $_REQUEST['oauth_token']) {
	$_SESSION['oauth_status'] = 'oldtoken';
	header('Location: ./clearsessions.php');
}

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);
$access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));
$_SESSION['access_token'] = $access_token;

unset($_SESSION['oauth_token']);
unset($_SESSION['oauth_token_secret']);

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
$user = $connection->get("account/verify_credentials");
$_SESSION['mybanner'] = ($user->profile_background_image_url);
$myuserid = ($user->screen_name);
$banner = $connection->get("users/profile_banner", ['screen_name' => '$myuserid']);
$_SESSION['bannerurl'] = ($banner->sizes->web->url);
$_SESSION['loginusername'] = ($user->name);
$_SESSION['loginid'] = ($user->screen_name);
$_SESSION['usericonurl'] = ($user->profile_image_url_https);
$_SESSION['tweetcount'] = ($user->statuses_count);
$_SESSION['followedcount'] = ($user->friends_count);
$_SESSION['followercount'] = ($user->followers_count);
$_SESSION['likescount'] = ($user->favourites_count);
$_SESSION['profile'] = ($user->description);
$_SESSION['location'] = ($user->location);
$_SESSION['myuserid'] = ($user->screen_name);
header('Location: timeline.php');
