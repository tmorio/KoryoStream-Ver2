<title>工陵祭TL Ver2.3 | TWIAPI:MAIN TRSAPI:OFFLINE FILTER:ON</title>
<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

require '../autoload.php';
require 'acs.php';
use Abraham\TwitterOAuth\TwitterOAuth;
function search(array $query)
{
$toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, MYTOKEN, MYSEA);
return $toa->get('search/tweets', $query);
}

$query = array(
  "count" => 13,
  "q" => "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -:RT -:https",
  "result_type" => "recent",
);

$results = search($query);

$access_token = getAccessToken("xxxxxxxxxxxxxxxxxxx","xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx")->access_token;
function getAccessToken($client_id, $client_secret, $grant_type = "client_credentials", $scope = "http://api.microsofttranslator.com"){
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => "https://datamarket.accesscontrol.windows.net/v2/OAuth2-13/",
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query(array(
            "grant_type" => $grant_type,
            "scope" => $scope,
            "client_id" => $client_id,
            "client_secret" => $client_secret
            ))
        ));
    return json_decode(curl_exec($ch));
}
function Translator($access_token, $params){
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => "https://api.microsofttranslator.com/v2/Http.svc/Translate?".http_build_query($params),
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => true,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ". $access_token),
        ));
    preg_match('/>(.+?)<\/string>/',curl_exec($ch), $m);
    return $m[1];
}
?>
<body bgcolor="black">
<?php foreach ($results->statuses as $result):?>
<?php

if (strstr(($result->text), 'red:')) {
  echo "<font color='red' ";
	if (strstr(($result->text), 'big:')) {
 	 echo "size='9'>";
 	} else {
  	if (strstr(($result->text), 'small:')) {
  	echo "size='4'>";
 	} else {
  	echo "size='6'>";
	 }
	 }
 } else {
	if (strstr(($result->text), 'yellow:')) {
 	 echo "<font color='yellow' ";
		if (strstr(($result->text), 'big:')) {
 		 echo "size='9'>";
 		} else {
  		if (strstr(($result->text), 'small:')) {
 		 echo "size='4'>";
		 } else {
  		echo "size='6'>";
		 }
 		}
 	} else{
if (strstr(($result->user->screen_name), 'xxxxxxxxxxxxxxxxxxxxxx')){
                echo "<font color='#2fff00' size='7' face='ヒラギノ丸ゴ ProN W4'>";
        }else{
  	echo "<font color='#ffffff'";
	if (strstr(($result->text), 'big:')) {
 	 echo "size='9'>";
 	} else {
  	if (strstr(($result->text), 'small:')) {
  	echo "size='4'>";
 	} else {
	echo "size='6'>";
	 }
       }
     }
   }
 }

if (strstr(($result->text), 'trans:')) {
        $trans_enable = '1';
	$before_trans = str_ireplace('trans:', ' ', ($result->text));
        } elseif (strstr(($result->text), 'trans-jp:')) {
        $trans_enable = '2';
        $before_trans = str_ireplace('trans-jp:', ' ', ($result->text));
        }else{
        $trans_enable = '0';
        $before_trans = ($result->text);
        }


if (strstr($before_trans, 'pokita:')) {
        $before_trans2 = str_ireplace('pokita:', 'ぽきたw 魔剤ンゴ！？ ありえん良さみが深いw
二郎からのセイクで優勝せえへん？ そり！そりすぎてソリになったwや、漏れのモタクと化したことのNASA✋そりでわ、無限に練りをしまつ、ぽやしみ〜😇 ', ($result->text));
        } else {
        $before_trans2 = $before_trans;
        }

if (strstr($before_trans2, 'right:')) {
        $before_trans3 = str_ireplace('right:', ' ', $before_trans2);
        $right = "1";
        } else {
	$right = "0";
        $before_trans3 = $before_trans2;
        }

	$ngword = array('xxxxxxxxxxxxx');
        $result_text4 = str_ireplace($ngword, '', $result_text3);
	$delcmd = array('red:','yellow:','big:','small:');
	$result_text5 = str_ireplace($delcmd, '', $result_text4);
if (strstr($result_text5, 'shutup:')) {
        $start_trans = str_ireplace('shutup:', 'うっせ', $result_text5);
        } else {
        $start_trans = $result_text5;
        }
if($trans_enable == 1){
	$result_text4 = Translator($access_token, array('text' => $start_trans,'to' => 'ja', 'from' => 'en'));
	$trans_enable = '0';
	}elseif($trans_enable == 2){
        $result_text4 = Translator($access_token, array('text' => $start_trans,'to' => 'en', 'from' => 'jp'));
        $trans_enable = '0';
        }else{
	$result_text4 = $start_trans;
	}

$textcount = mb_strlen($result_text4);



if($textcount >= 120){
		if($right == 1){
		        echo "<marquee scrollamount='4' scrolldelay='6' direction='right' truespeed>";
			}else{
        			echo "<marquee scrollamount='4' scrolldelay='6' truespeed>";
				}
		}elseif($textcount >= 115){
        		if($right == 1){
        			echo "<marquee scrollamount='4' scrolldelay='6' direction='right' truespeed>";
			}else{
        			echo "<marquee scrollamount='3' scrolldelay='5' truespeed>";
				}
		}elseif($textcount >= 100){
        		if($right == 1){
        			echo "<marquee scrollamount='4' scrolldelay='6' direction='right' truespeed>";
        		}else{
        			echo "<marquee scrollamount='3' scrolldelay='6' truespeed>";
				}
		}elseif($textcount >= 80){
			if($right == 1){
        			echo "<marquee scrollamount='4' scrolldelay='6' direction='right' truespeed>";
        		}else{
        			echo "<marquee scrollamount='4' scrolldelay='5' truespeed>";
        			}
		}elseif($textcount >= 70){
        		if($right == 1){
        			echo "<marquee scrollamount='4' scrolldelay='6' direction='right' truespeed>";
        		}else{
				echo "<marquee scrollamount='4' scrolldelay='7' truespeed>";
        			}
		}elseif($textcount >= 60){
			if($right == 1){
        			echo "<marquee scrollamount='4' scrolldelay='6' direction='right' truespeed>";
        		}else{
        			echo "<marquee scrollamount='4' scrolldelay='8' truespeed>";
        			}
		}elseif($textcount >= 50){
			if($right == 1){
        			echo "<marquee scrollamount='4' scrolldelay='6' direction='right' truespeed>";
        		}else{
        			echo "<marquee scrollamount='3' scrolldelay='4' truespeed>";
				}
        	}elseif($textcount >= 40){
			if($right == 1){
        			echo "<marquee scrollamount='4' scrolldelay='6' direction='right' truespeed>";
        		}else{
        			echo "<marquee scrollamount='3' scrolldelay='5' truespeed>";
        			}
		}elseif($textcount >= 30){
			if($right == 1){
        			echo "<marquee scrollamount='4' scrolldelay='6' direction='right' truespeed>";
        		}else{
        			echo "<marquee scrollamount='3' scrolldelay='7' truespeed>";
        			}
		}elseif($textcount >= 20){
			if($right == 1){
       			 	echo "<marquee scrollamount='4' scrolldelay='6' direction='right' truespeed>";
        		}else{
        			echo "<marquee scrollamount='2' scrolldelay='4' truespeed>";
        			}
		}elseif($textcount >= 10){
			if($right == 1){
        			echo "<marquee scrollamount='4' scrolldelay='6' direction='right' truespeed>";
        		}else{
        			echo "<marquee scrollamount='2' scrolldelay='6' truespeed>";
				}
        	}else{
			if($right == 1){
        			echo "<marquee scrollamount='4' scrolldelay='6' direction='right' truespeed>";
        		}else{
        			echo "<marquee scrollamount='2' scrolldelay='7' truespeed>";
        			}
	}
echo $result_text4;
echo "</marquee></font>";
echo "";
?>
<?php endforeach;?>
<meta http-equiv="Refresh" content="11">
<footer>
<font color="#00f9ff" size="8"><marquee scrollamount="1" scrolldelay="3" truespeed>Twitter #koryosai2016 #koryosai #工陵祭</marqee>
</font></font></footer>
