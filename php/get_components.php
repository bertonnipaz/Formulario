<?php
// require_once 'config.php';
$course = $_GET['course'];

$database = new SQLite3('form_database.sqlite');

$sql = "SELECT id FROM courses WHERE name = '$course'";
$res = $database->query($sql);
$row = $res->fetchArray();
$row = (object) $row;
$course_id = $row->id;

$sql = "SELECT * FROM components WHERE course_id = '$course_id' ORDER BY name ASC";
$res = $database->query($sql);

echo '<label>Componente Curricular (' . $course . ')</label>';
echo '<select name="componentes[]" multiple="" class="ui search multiple fluid dropdown" id="componentes-log" required>
<option value="">Componente</option>';
while($row = $res->fetchArray()) {
	$row = (object) $row;

	if ($row->name != NULL) {
		?>
		<option value="<?=$row->name?>"><?=$row->name?></option>
		<?php
	}
}
?>
</select>