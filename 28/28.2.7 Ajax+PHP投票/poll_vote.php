<?php
$vote = $_REQUEST['vote'];
//get content of textfile
$filename = "poll_result.txt";
$content = file($filename);
//put content in array
$array = explode("||", $content[0]);
$yes = intval($array[0]);
$no = intval($array[1]);
if ($vote == 0) {
	 $yes = $yes + 1;
}
if ($vote == 1){
	 $no = $no + 1;
}
//insert votes to txt file
$insertvote = $yes."||".$no;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>
<h2>投票结果:</h2>
<p>总票数：<?php echo $no+$yes ; ?>
<p>喜欢：<br>
<img src="poll.png" width='<?php echo 100*round($yes/($no+$yes),2) ; ?>' height='20'> <?php echo 100*round($yes/($no+$yes),2) ; ?>%
<p>不喜欢：<br>
<img src="poll.png" width='<?php echo(100*round($no/($no+$yes),2)); ?>' height='20'> <?php echo(100*round($no/($no+$yes),2)); ?>%
<br><br>
<a href="test.html">再次投票</a>