<?php

$id = $_REQUEST['id'];

$ids = explode(',',$id);


require_once("../Db.php");
$DB= new DB_MYSQL();

$terms= $DB->get_all("select term from term");
foreach($ids as &$iid)
{
	$result= true;
	$result= $result && $DB->delete("major","major='$iid'");
	foreach($terms as $term)
	{
		$DB->query("drop table sem".$term['term']."_maj".$iid);
	}
}

if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array("isError"=>"true","msg"=>$DB->errormsg));
}
?>