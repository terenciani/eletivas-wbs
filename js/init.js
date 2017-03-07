var eletiva = new eletiva();
var inscricao = new inscricao();
var selectEletiva = $('#eletiva');
var detalhesEletiva = $('#detalhes-eletiva');
var descricaoEletiva = $('#descricao-eletiva');
var vagasDisponiveis = $('#vagas-disponiveis');
var btnConfirmarInscricao = $('#btn-confirmar');
var btnCancelar = $('#btn-cancelar');
var txtSenha = $('#senha');
var txtSenhaConfirmada = $('#senha-confirmada');

(function($){
  $(function(){
    eletiva.preencherSelect(selectEletiva);
    $('select').material_select();

    txtSenhaConfirmada.on('change', function(){
        if(txtSenhaConfirmada.val() == txtSenha.val()){
          return true;
        }else{
          alert("As senhas não conferem");
          txtSenhaConfirmada.val("");
          txtSenhaConfirmada.focus();
        }
    });

    selectEletiva.on('change', function(){
      eletiva.detalhesEletiva(detalhesEletiva, descricaoEletiva, this.value);
      eletiva.quantidadeVagas(vagasDisponiveis, this.value);
      $('#detalhes').removeClass('esconder');
    });

    btnConfirmarInscricao.click(function(){
      inscricao.efetuarInscricao($("#formInscricao"));
    });
    
    btnCancelar.click(function(){
      $('#detalhes').addClass('esconder');
    });


  }); // end of document ready
})(jQuery); // end of jQuery name space