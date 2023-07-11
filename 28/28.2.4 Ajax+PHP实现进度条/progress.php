<?php 
//清除缓存
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
//text.txt文件用于记录初始时间
$txt = file_get_contents("text.txt");
$timeone = date("i:s",time());
$timenow = getdate();  
if ($txt == "") {  //如果text.txt文件空，则将当前时间记录下
    file_put_contents("text.txt", $timeone);
    echo 0;    //并向客户端返回0，也就是进度条为0%
}else{
    $arrtxt = explode(":", $txt);           
    $value1 = $arrtxt[0]*60+$arrtxt[1];    
    $value2 = $timenow["minutes"]*60+$timenow["seconds"];
    $proportion = $value2-$value1;   //得到时间差，相当于已完成传输多少数据
    if ($proportion >= 100){     //如果时间差大于100，则清空text.txt文档。防止返回给客户端的值大于100
        file_put_contents("text.txt","");
    }
    echo $proportion;  //返回给客户端的值
}
?>