<?php
require_once("smarty.php");

session_start();
if(isset($_SESSION['userflag']) && $_SESSION['userflag'] == "admin")
{
	$smarty->assign("dir","managemajor");
	$smarty->assign("url","121.42.163.214/2645-6");
	$smarty->assign("primate","major");
	$th[]=array("field"=>"major_name","editor"=>"{type:'validatebox',options:{required:true,missingMessage:'此字段为必填项'}}","title"=>"专业名称");
	
    $smarty->assign("TableHeads",$th);

	$smarty->display("crud2.html");
}
else
{
	print("Access Denied");
    echo "<script language=\"JavaScript\">alert(\"你好，请先登录！\");window.location.replace('../../index.php');</script>";
}
?>