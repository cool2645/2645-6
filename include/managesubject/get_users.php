<?php

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'subject';
$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
$itemid = isset($_POST['itemid']) ? $_POST['itemid'] : '%';
$offset = ($page-1)*$rows;

require_once("../Db.php");
$DB= new DB_MYSQL();
$where = "subject_name like '$itemid'";
$result = array();
$row= $DB->get_one("select count(*) from subject where ".$where);
$result["total"] = $row['count(*)'];
$items= $DB->get_all("select * from subject where ".$where." order by $sort $order limit $offset,$rows");
$result["rows"] = $items;
//while($row = mysql_fetch_object($rs)){
//	array_push($result, $row);
//}
	echo json_encode($result);

?>