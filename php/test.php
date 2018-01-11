<?php
$database = new SQLite3('form_database.sqlite');

$sql = "SELECT * FROM questions";
$res = $database->query($sql);

while($row = $res->fetchArray()) {
	$row = (object) $row;
	
	// if ($row->question != NULL) {
		echo "Id: " . $row->id . "  question: " . $row->question . "  category: " . $row->category . "<br>";
	// }
}

?>