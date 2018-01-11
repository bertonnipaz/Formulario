<?php
session_start();
if (!isset($_SESSION['answers'])) {
	$_SESSION['answers'] = array();
}
$size = $_POST['total_componentes'];
$current_comp = $_POST['current_component'];
for ($i=1; $i <= $size; $i++) { 
	if (isset($_POST['comp_' . $i . '_question_1']) && $_POST['comp_' . $i . '_question_1'] != NULL) {
		$comp_q1 = $_POST['comp_' . $i . '_question_1'];
		$comp_q2 = $_POST['comp_' . $i . '_question_2'];
		$comp_q3 = $_POST['comp_' . $i . '_question_3'];
		$comp_q4 = $_POST['comp_' . $i . '_question_4'];
		array_push($_SESSION['answers'], $current_comp);
		array_push($_SESSION['answers'], $comp_q1);
		array_push($_SESSION['answers'], $comp_q2);
		array_push($_SESSION['answers'], $comp_q3);
		array_push($_SESSION['answers'], $comp_q4);
	}
}
if (isset($_POST['finished']) && $_POST['finished'] == 'finished') {
	echo 'acabou o form do componente<br>';
	foreach ($_SESSION['answers'] as $answer) {
		echo "Answer: " . $answer . "<br>";
	}
	unset($_POST['finished']);
	unset($_SESSION['count']);
	unset($_SESSION['componentes']);
	unset($_SESSION['answers']);
	echo "<br><a href='home.php'>Voltar</a>";
} else {
	header("location: components.php");
}
?>