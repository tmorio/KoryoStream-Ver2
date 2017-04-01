<?php
session_start();

require '../autoload.php';
require 'env.php';
use Abraham\TwitterOAuth\TwitterOAuth;

if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}

$access_token = $_SESSION['access_token'];
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

$user = $connection->get("account/verify_credentials");
$_SESSION['loginusername'] = ($user->name);
$_SESSION['loginid'] = ($user->screen_name);
$_SESSION['usericonurl'] = ($user->profile_image_url_https);
$_SESSION['tweetcount'] = ($user->statuses_count);
$_SESSION['followedcount'] = ($user->friends_count);
$_SESSION['followercount'] = ($user->followers_count);
$_SESSION['likescount'] = ($user->favourites_count);

header('Location: timeline.php');
?>
