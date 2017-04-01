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
$statuses = $connection->get('statuses/home_timeline', ['count' => '9']);
?>
<div>
</a>
<body bgcolor="black">
<?php foreach ($statuses as $status):?>
<ul>
<?php
$textcount = mb_strlen($status->text);
if($textcount >= 160){
	echo "<marquee loop='2' scrollamount='2' scrolldelay='2' truespeed>";
	echo "<font color='#fffffff' size='5'>";
	echo ($status->text);
	echo "</marquee>";
	}elseif($textcount >= 140){
        echo "<marquee loop='2' scrollamount='2' scrolldelay='4' truespeed>";
        echo "<font color='#fffffff' size='5'>";
        echo ($status->text);
        echo "</marquee>";
	}elseif($textcount >= 120){
        echo "<marquee loop='2' scrollamount='2' scrolldelay='6' truespeed>";
        echo "<font color='#fffffff' size='5'>";
        echo ($status->text);
        echo "</marquee>";
        }elseif($textcount >= 100){
        echo "<marquee loop='2' scrollamount='2' scrolldelay='8' truespeed>";
        echo "<font color='#fffffff' size='5'>";
        echo ($status->text);
        echo "</marquee>";
        }elseif($textcount >= 80){
        echo "<marquee loop='2' scrollamount='2' scrolldelay='10' truespeed>";
        echo "<font color='#fffffff' size='5'>";
        echo ($status->text);
        echo "</marquee>";
        }elseif($textcount >= 60){
        echo "<marquee loop='2' scrollamount='2' scrolldelay='12' truespeed>";
        echo "<font color='#fffffff' size='5'>";
        echo ($status->text);
        echo "</marquee>";
        }elseif($textcount >= 50){
        echo "<marquee loop='2' scrollamount='2' scrolldelay='14' truespeed>";
        echo "<font color='#fffffff' size='5'>";
        echo ($status->text);
        echo "</marquee>";
        }elseif($textcount >= 40){
        echo "<marquee loop='2' scrollamount='2' scrolldelay='6' truespeed>";
        echo "<font color='#fffffff' size='5'>";
        echo ($status->text);
        echo "</marquee>";
        }elseif($textcount >= 30){
        echo "<marquee loop='2' scrollamount='2' scrolldelay='8' truespeed>";
        echo "<font color='#fffffff' size='5'>";
        echo ($status->text);
        echo "</marquee>";
        }elseif($textcount >= 20){
        echo "<marquee loop='2' scrollamount='2' scrolldelay='10' truespeed>";
        echo "<font color='#fffffff' size='5'>";
        echo ($status->text);
        echo "</marquee>";
        }elseif($textcount >= 10){
        echo "<marquee loop='2' scrollamount='2' scrolldelay='12' truespeed>";
        echo "<font color='#fffffff' size='5'>";
        echo ($status->text);
        echo "</marquee>";
        }else{
        echo "<marquee loop='2' scrollamount='2' scrolldelay='12' truespeed>";
        echo "<font color='#fffffff' size='5'>";
        echo ($status->text);
        echo "</marquee>";
        }
?>
<meta http-equiv="Refresh" content="30">
</ul>
<?php endforeach;?>
</div>
