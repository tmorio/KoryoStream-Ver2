
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
$text = $_POST['tweet'];
$connection->post("statuses/update", array("status" => $text));

header('Location: countcheck.php');
?>

