<?php require_once 'header.php' ?>
<div class="ui grid container">
	<div class="row">
		<div class="column">
			<div class="ui form">
				<div class="ten wide field">
					<label>Selecione o formulário</label>
					<div class="ui selection dropdown" id="select-form">
						<i class="dropdown icon"></i>
						<div class="default text">Selecione o formulário</div>
						<div class="menu">
							<div class="item" id="egresso" data-value="form_egresso.php">Egresso</div>
							<div class="item" id="pre_egresso" data-value="form_pre_egresso.php">Pré-Egresso</div>
							<div class="item" id="aluno" data-value="form_aluno.php">Aluno</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="column"></div>
	</div>
</div>
<div class="ui grid container ajax-div"></div>
<script>
	var forms = {};
	$('#select-form').dropdown({
		onChange: function(url) {
			if (forms[url]) {
					$('.ajax-div').html(forms[url]);
					return;
			}
			$.ajax({
				url: '../php/' + url,
				success: function(data) {
					forms[url] = data;
					$('.ajax-div').html(forms[url]);
				}
			});
		}
	});
</script>
<?php
unset($_SESSION['count']);
unset($_SESSION['componentes']);
require_once 'footer.php';
?>