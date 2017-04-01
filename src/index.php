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
	$statuses = $connection->get('statuses/user_timeline', ['count' => '100'], ['screen_name' => '$myatid'] );
?>

	<?php include('html.inc');?>
	表示:自分のツイート<br>
	<div onclick="obj=document.getElementById('menu2').style; obj.display=(obj.display=='none')?'block':'none';">
	<font color="blue">表示対象変更<a style="cursor:pointer;">▽</a></font><div id="menu2" style="display:none;clear:both;">
	<p><a href="index.php">自分のツイート</a></p>
	<p><a href="mylikes.php">いいねしたツイート</a></p>
	</div>
	<p></p>

<?php foreach ($statuses as $status): ?>
<ul>
        <?php $endpoint = str_replace("\n","<br />",($status->text));
        $endpoint2 = preg_replace("/#(w*[一-龠_ぁ-ん_ァ-ヴーａ-ｚＡ-Ｚa-zA-Z0-9]+|[a-zA-Z0-9_]+|[a-zA-Z0-9_]w*)/u",
         " <a href=\"https://twitter.com/search/%23\\1\" target=\"twitter\">#\\1</a>", $endpoint);
        $endpoint3=preg_replace("/(@[A-Za-z0-9_]{1,15})/", " <a href=\"https://twitter.com/search/\\1\" target=\"twitter\">\\1</a>", $endpoint2);
        $endpoint4=preg_replace("/(https:\/\/t.co\/[a-zA-Z0-9]{10})/", "<a href=\"\\0\" target=\"_blank\">\\0</a>", $endpoint3);
        ?>
        <img src="<?php echo $status->user->profile_image_url;?>"> <?php echo ($status->user->name)?>  @<?=$status->user->screen_name?><p></p>
        <?php echo ($endpoint4)?><p></p>
        POST日時：<?=date('Y/m/d H:i:s', strtotime($status->created_at))?><br>
        <?php
        $rtida =($status->id);?>
        <form style="display: inline" method="post" action="retweet.php"> 
        <?php echo"<input type='hidden' name='rtida' value='$rtida'>" ?>
        <input type="submit" value="RT"> 
        </form>
        <?php
        $rtida =($status->id);?>
        <form style="display: inline" method="post" action="unretweet.php"> 
        <?php echo"<input type='hidden' name='rtida' value='$rtida'>" ?>
        <input type="submit" value="RT解除"> 
        </form>
        <?php
        $rtida =($status->id);?>
        <form style="display: inline" method="post" action="like.php"> 
        <?php echo"<input type='hidden' name='rtida' value='$rtida'>" ?>
        <input type="submit" value="いいね"> 
        </form>
        <?php
        $rtida =($status->id);?>
        <form style="display: inline" method="post" action="unlike.php"> 
        <?php echo"<input type='hidden' name='rtida' value='$rtida'>" ?>
        <input type="submit" value="いいね解除"> 
        </form>
<!--        <?php 
        $rtida =($status->id);?>
        <form style="display: inline" method="post" action="deletetweet.php"> 
        <?php echo"<input type='hidden' name='rtida' value='$rtida'>" ?>
       <input type="submit" value="ツイート削除"> 
        </form>-->
        <?php
        $rtida =($status->id);
        $replyto = ($status->user->screen_name);?>
        <form style="display: inline" method="post" action="reply.php"> 
        <?php echo"<input type='hidden' name='rtida' value='$rtida'>" ?>
        <?php echo"<input type='hidden' name='replyto' value='$replyto'>" ?>
        <input type="text" name="reply" size="45">
        <input type="submit" value="リプライする"> 
        </form><br>
        --------------------------------------------------------------------------------------------
</ul>
<?php endforeach;?>
</div>
<?php include('footer.inc'); ?>

