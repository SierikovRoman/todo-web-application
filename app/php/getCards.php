<?php

require_once 'db_connection.php';


//$query = "SELECT c.id, c.title, c.description, c.category_id, ct.name AS category_name, c.priority_id, pr.name AS priority_name, c.date FROM card AS c
//		  LEFT JOIN category ct ON c.category_id = ct.id
//		  LEFT JOIN priority pr ON c.priority_id = pr.id
//		  ORDER BY c.id ASC";
//
//$result = mysqli_query($con, $query);
//
//$arr = array();
//if(mysqli_num_rows($result) != 0) {
//	while($row = mysqli_fetch_assoc($result)) {
//			$arr[] = $row;
//	}
//}
//
//echo $json_info = json_encode($arr);

$query = "SELECT c.id, c.title, c.description, c.category_id, ct.name AS category_name, c.priority_id, pr.name AS priority_name, c.date FROM card AS c
		  LEFT JOIN category ct ON c.category_id = ct.id
		  LEFT JOIN priority pr ON c.priority_id = pr.id
		  ORDER BY c.id ASC";

$result = pg_query($con, $query);

$arr = array();
if(pg_num_rows($result) != 0) {
    while($row = pg_fetch_assoc($result)) {
        $arr[] = $row;
    }
}

echo $json_info = json_encode($arr);

?>