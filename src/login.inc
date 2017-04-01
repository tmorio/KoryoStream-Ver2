<title>アクセス規制でも見れるクライアント | かぷツイ！ Ver2.1</title>
<div style="background-color:#cee5ff;min-height: 35px;margin-bottom: 20px;border: 1px solid #e7e7e7 !important;padding:15px 20px; 0">
<font size="5">かぷツイ! Ver2.1</font>
<Div Align="right"><print id="RealtimeClockArea2"></print>
<script type="text/javascript">
function set2fig(num) {
   var ret;
   if( num < 10 ) { ret = "0" + num; }
   else { ret = num; }
   return ret;
}
function showClock2() {
   var nowTime = new Date();
   var nowHour = set2fig( nowTime.getHours() );
   var nowMin = set2fig( nowTime.getMinutes() );
   var msg = "現在の時刻： " + nowHour + ":" + nowMin;
   document.getElementById("RealtimeClockArea2").innerHTML = msg;
}
setInterval('showClock2()',1000);
</script></Div><br><br><br>

