<?php
function queryToArray($res) {
    $i = 0;
    while ($row = mysqli_fetch_row($res)) {
        $array[$i] = $row;
        $i++;
    }
    return $array;
}

function insertGenerator($table, $field, $data)
{
	$sql = "SET FOREIGN_KEY_CHECKS=1; SET autocommit=0; START TRANSACTION; INSERT into $table (";
	$values = "VALUES (";
	$first_entry = FALSE;
	$num_fields = count($field);
	for ($i = 0; $i < $num_fields; $i++) {
		if ($first_entry === FALSE) {
			if (!empty($data[$i])) {
				$sql.= "$field[$i]";
				if ($data[$i] == "NULL") {
					$values.= "$data[$i]";
					$first_entry = TRUE;
				}
				else {
					$values.= "'$data[$i]'";
					$first_entry = TRUE;
				}
			}
		}
		else {
			if (!empty($data[$i])) {
				if ($data[$i] == "NULL") {
					$values.= ", NULL";
				}
				else {
					$values.= ", '$data[$i]'";
				}

				$sql.= ", $field[$i]";
			}

			if ($i === $num_fields - 1) {
				$sql.= ") ";
				$values.= "); COMMIT;";
			}
		}
	}

	// end of sql

	$sql.= $values;
	return $sql;
}
?>