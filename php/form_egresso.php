<style>
  #ef-step-2, #ef-step-2-1, #ef-step-3 {
    display: none;
  }
</style>
<script type="text/javascript">
  var componentes_size;
</script>
<title>Form Egresso</title>
<div class="row">
  <div class="column">
    <h3 class="ui dividing header">INSTRUMENTO DE AVALIAÇÃO DO COMPONENTE CURRICULAR, DO DOCENTE RESPONSÁVEL E DE AUTOAVALIAÇÃO</h3>
    <div class="ui text">
      <p>Prezados(as) estudantes, Este formulário foi pensado como uma forma de garantir a você o direito de participar do processo avaliativo do curso que realiza e do Corpo Docente (professores) com atuação no Campus Igarassu. A intenção deste instrumento avaliativo é obter informações, sob o ponto de vista dos estudantes, que colaborem para a avaliação dos cursos oferecidos, através da avaliação de cada Componente Curricular (disciplina), bem como para oferecer formações ao Corpo Docente nos pontos de maior necessidade proporcionando a melhoria do trabalho pedagógico. É importante que as respostas sejam dadas com consciência e honestidade para que os pontos positivos possam continuar existindo e serem ampliados, além de possibilitar a visualização e melhoria daqueles que precisam ser melhor trabalhados. <b>OBS: Responder o formulário para todos os componentes curriculares que participou no semestre</b>.</p>
    </div><br>
    <form class="ui form" action="components.php" method="POST" id="my_form">
      <div class="field required">
        <label>E-mail</label>
        <div class="field">
          <input type="text" name="email" id="email" placeholder="E-mail" required>
        </div>
      </div>
      <div class="field">
        <div class="grouped fields required">
          <label for="curso">Curso</label>
          <div class="field">
            <div class="ui radio checkbox">
              <input type="radio" name="curso" value="Informática" tabindex="0">
              <label>Informática para Internet</label>
            </div>
          </div>
          <div class="field">
            <div class="ui radio checkbox">
              <input type="radio" name="curso" value="Logística" tabindex="0">
              <label>Logística</label>
            </div>
          </div>
        </div>
      </div>
      <div class="field required" id="step-2"> <!-- #step-2 -->
      </div> <!-- /#step-2 -->
      <button class="ui button send-button positive" type="submit" tabindex="-1">Próximo</button>
    </form>
  </div>
</div>
<script>
  $('.send-button').hide();
  $('#step-2').hide();
  $(document).ready(function(){
    var email, componentes, curso, professor;
    $('#email').blur(function() {
      email = $("#email").val();
    });
    $("input[name='curso']").on('change', function() {
      curso = $("input[name='curso']:checked").val();
      if ((email != null && curso != null)) {
        $.ajax({
          url: 'get_components.php?course=' + curso,
          success: function(data) {
            $('#step-2').html(data);
            $('#step-2 select').dropdown();
            $('#step-2').show('slow');
            $('.send-button').show('slow');
          }
        });
      }
    });
  });
  $('.ui.radio.checkbox').checkbox();
</script>