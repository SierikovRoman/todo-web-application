<?php

require_once 'db_connection.php';

$query = "SELECT c.id, c.name, c.detail, c.list_id, ls.name AS list_name, c.priority_id, pr.name AS priority_name, c.date_created FROM card AS c
		  LEFT JOIN list ls ON c.list_id = ls.id
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