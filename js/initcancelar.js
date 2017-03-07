var inscricao = new inscricao();
var txtMatricula = $('#matricula');
var detalhesInscricao = $('#detalhes-inscricao');
var btnCancelar = $('#btn-cancelar');

(function($){
  $(function(){
    
    txtMatricula.on('change', function(){
      inscricao.detalhesInscricao(detalhesInscricao, this.value);
      $('#detalhes').removeClass('esconder');
      $('#div-senha').removeClass('esconder');
    });

    btnCancelar.click(function(){
    	inscricao.cancelar($("#formCancelar"));
  	});
  }); // end of document ready
})(jQuery); // end of jQuery name space