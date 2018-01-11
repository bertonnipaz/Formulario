<?php
require_once 'header.php';
$database = new SQLite3('form_database.sqlite');

// checa se foi escolhido algum componente
if (isset($_POST['componentes']) && !empty($_POST['componentes'])) {
	$componentes = $_POST['componentes'];
	$_SESSION['componentes'] = $componentes;
} else {
	$componentes = $_SESSION['componentes'];
}
if (!isset($_SESSION['count'])) {
	$_SESSION['count'] = 0;
	$count = 0;
} else {
	$count = $_SESSION['count'];
}
if ($count >= sizeof($componentes)) {
	$count = 0;
	unset($_SESSION['count']);
}
?>
<style type="text/css">
	.question {
		font-size: 20px;
	}
</style>
<div class="ui grid container">
	<div class="row">
		<div class="column">
			<div class="field progresso">
				<h3 class="ui dividing header">COMPONENTES</h3>
				<div class="ui indicating progress" data-value="<?=$count+1?>" data-total="<?= sizeof($componentes)?>" id="example5">
					<div class="bar"></div>
					<div class="label">Respondendo componentes</div>
				</div>
			</div>
			<form class="ui form answer" action="get_questions.php" method="POST">
				<input type="hidden" name="total_componentes" value="<?= sizeof($componentes) ?>">
				<input type="hidden" name="current_component" value="<?= $componentes[$count] ?>">
				<?php
				if ($count < sizeof($componentes)) {
				// select para pegar todas as questões da categoria 'component'
					$sql = "SELECT * FROM questions WHERE category = 'component'";
					$result = $database->query($sql);
					$arr = explode(' - ', $componentes[$count]);
					echo '<br><h2 class="ui dividing header">' . $arr[1] . '</h2>';
					$question_number = 0;
					while($questions = $result->fetchArray()) {
						$question_number++;
						echo '<div class="field">';
						$questions = (object) $questions;
						echo "<p class='question'>" . $questions->question . "</p>";

						// sql para pegar as opções referentes à questão exibida
						$sql = "SELECT * FROM options WHERE category = 'component' AND question_id = '$questions->id'";
						$res = $database->query($sql);

						// laço para exibir as opções
						while($options = $res->fetchArray()) {
							$options = (object) $options;
							echo '<div class="grouped fields required">
							<div class="field">
								<div class="ui radio checkbox">
									<input type="radio" name="comp_' . ($count + 1). '_question_' . $question_number . '" value="' . $options->option_txt . '" tabindex="0" required>
									<label>' . $options->option_txt . '</label>
								</div>
							</div>
						</div>
						';
					}
					echo '</div>';
				}
				$count++;
			}
			$_SESSION['count'] = $count;
			?>
			<?php if ($count >= sizeof($componentes)): ?>
				<input type="hidden" name="finished" value="finished">
			<?php endif ?>
			<button class="ui button disabled send-button positive" onclick="progressBar()">Próximo</button>
		</form>
	</div>
</div>
</div>
<script type="text/javascript">
	var names = [];

	function progressBar() {
		$('#example5').progress('increment');
	}
	$('#example5').progress({
		text: {
			active  : 'Respondendo {value} de {total} componentes',
			success : 'Respondendo o último componente!'
		}
	});
	$('.ui.radio.checkbox').checkbox();

	$('[type=radio]').on('change', function() {
		console.log(arguments);
		$('[type=radio]').each(function(_, el) {
			names.push($(el).attr('name'));
		});
		checked = $('[type=radio]:checked').length;
		names = $.unique(names);
		console.log("Checked length: " + checked + "\n");
		console.log("Names length: " + names.length + "\n");
		if (checked == names.length) {
			$('.send-button').removeClass('disabled');
		}
	});
</script>
<?php require_once 'footer.php' ?>