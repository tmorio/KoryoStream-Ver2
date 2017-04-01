<title>Morikapu.Net  かぷツイ！ Ver2.1</title>
<div style="background-color:#cee5ff;min-height: 35px;margin-bottom: 20px;border: 1px solid #e7e7e7 !important;padding:15px 20px; 0">
<font size="6">かぷツイ! Ver2.1</font>
<div onclick="obj=document.getElementById('menu1').style; obj.display=(obj.display=='none')?'block':'none';">
<Div Align="right"><font size="5" color="#0a64ff"><right><a style="cursor:pointer;">▼</font><img src="<?php echo $_SESSION['usericonurl'] ?>" alt="...">
</div></a>
</div>
  
<div id="menu1" style="display:none;clear:both;">
<Div Align="right">
<font size="5"><img src="<?php echo $_SESSION['usericonurl'] ?>" alt="..."><?php echo $_SESSION['loginusername'];?>(@<?php echo $_SESSION['loginid'];?>)</font></font><br>
<br>
<p style="width:20em;"><font size="2" color="#1f1f99"></font><font size="4">
<?php echo $_SESSION['profile']?></font></p><br><br>
<font size="4"><p><a href="index.php">マイツイート</a></p>
<p><a href="timeline.php">タイムライン</a></p>
<p><a href="mention.php">メンション</a></p>
<p><a href="clearsessions.php">ログアウト</a></p>
<p><a href="timeline-nico.php">ニコニコ動画風タイムライン(Beta)</a></p>
<p><a href="koryosai2016.php">EE専テストモード</a></p></font> 
<form style="display: inline" method="POST" action="remove.php"　onsubmit="return false;">
<label>リムーブしたい人の@ID：</label>
<input type="text" name="rim">
<input type="button" value="リムーブ" onClick="submit();">
</form><br>
<form style="display: inline" method="POST" action="follow.php"　onsubmit="return false;">
<label>フォローしたい人の@ID：</label>
<input type="text" name="follow">
<input type="button" value="フォロー" onClick="submit();">
</form>
</div></div><br><br>

<font size="3" color="#ff0000">
ツイート数：<?php echo $_SESSION['tweetcount'] ?>&nbsp;
フォロー数：<?php echo $_SESSION['followedcount'] ?>&nbsp;
フォロワー数：<?php echo $_SESSION['followercount'] ?>&nbsp;
いいね：<?php echo $_SESSION['likescount'] ?>&nbsp;</font><br><br>
<form wrap="hard" method="POST" action="tweet.php"　onsubmit="return false;">
<label>ツイートする</label><br> <textarea name="tweet" rows="4" cols="50" onkeyup="ShowLength(value);"></textarea>
<input style="display: inline" type="button" value="ツイート" onClick="submit();"></form>
<p id="inputlength"></p>
<script type="text/javascript"><!--
   function ShowLength( str ) {
      document.getElementById("inputlength").innerHTML ="文字数："+ str.length;
   }
// --></script><br>
