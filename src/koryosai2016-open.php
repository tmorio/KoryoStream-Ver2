<title>工陵祭TL Ver2.1 | TWIAPI:MAIN TRSAPI:ONLINE AUTO:ON</title>
<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

require '../autoload.php';
require 'acs2.php';
use Abraham\TwitterOAuth\TwitterOAuth;
function search(array $query)
{
$toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, MYTOKEN, MYSEA);
return $toa->get('search/tweets', $query);
}

$query = array(
  "count" => 25,
  "q" => "-:RT #koryosai2016 OR #koryosai OR #工陵祭",
  "result_type" => "recent",
);

$results = search($query);

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
  	echo "size='5'>";
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
  		echo "size='5'>";
		 }
 		}
 	} else{
if (strstr(($result->user->screen_name), 'xxxxxxxxxxxxxxx')){
                echo "<font color='#2fff00' size='7' face='ヒラギノ丸ゴ ProN W4'>";
        }else{
  	echo "<font color='#ffffff'";
	if (strstr(($result->text), 'big:')) {
 	 echo "size='9'>";
 	} else {
  	if (strstr(($result->text), 'small:')) {
  	echo "size='4'>";
 	} else {
	echo "size='5'>";
	 }
       }
     }
   }
 }


if (strstr(($result->text), 'pokita:')) {
        $before_trans2 = str_ireplace('pokita:', 'ぽきたw 魔剤ンゴ！？ ありえん良さみが深いw
二郎からのセイクで優勝せえへん？ そり！そりすぎてソリになったwや、漏れのモタクと化したことのNASA✋そりでわ、無限に練りをしまつ、ぽやしみ〜😇 ', ($result->text));
        } else {
        $before_trans2 = ($result->text);
        }

if (strstr($before_trans2, 'right:')) {
        $before_trans3 = str_ireplace('right:', ' ', ($result->text));
        $right = "1";
        } else {
	$right = "0";
        $before_trans3 = $before_trans2;
        }

        $result_text5 = str_ireplace('#koryosai2016', ' ', $before_trans3);
        $result_text6 = str_ireplace('#工陵祭', ' ', $result_text5);
        $result_text7 = str_ireplace('.', ' ', $result_text6);
	$result_text1 = str_ireplace('big:', ' ', $result_text7);
	$result_text2 = str_ireplace('small:', ' ', $result_text1);
	$result_text3 = str_ireplace('red:', ' ', $result_text2);
        $result_text4 = str_ireplace('#koryosai', ' ', $result_text3);
	$start_trans = str_ireplace('yellow:', ' ', $result_text4);

$textcount = mb_strlen($start_trans);



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
echo $start_trans;
echo "</font></marquee>";
echo "";
?>
<?php endforeach;?>
<meta http-equiv="Refresh" content="20">
<footer>
<font color="#00f9ff" size="7"><marquee scrollamount='1' scrolldelay='6' truespeed>#koryosai2016 #koryosai #工陵祭</marqee></font>
</font></footer>
