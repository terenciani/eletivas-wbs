function inscricao(){
    
    this.url = "service/inscricao.service.php";
    
    
    this.detalhesInscricao = function(detalhesInscricao, matricula){
        detalhesInscricao.empty();
    
        $.ajax({
            url : this.url+"?passo=detalhesInscricao&matricula="+matricula
        }).done(function(dados){
        	if(dados.length==0){
        		detalhesInscricao.append($("<p class='red-text center'></p>").text("Nenhuma inscrição encontrada"));
        		$('#div-senha').addClass('esconder');
        		$('#cancelamento').addClass('esconder');
        	}else{
            	$.each(dados, function(key, val){
            		detalhesInscricao.append($("<p class='negrito'></p>").text("Eletiva:"));
	                detalhesInscricao.append($("<p></p>").text(val.nome));
	                detalhesInscricao.append($("<p class='negrito'></p>").text("Professor:"));
	                detalhesInscricao.append($("<p></p>").text(val.professor));
	                detalhesInscricao.append($("<p class='negrito'></p>").text("Descrição:"));
	                detalhesInscricao.append($("<p></p>").text(val.descricao));
	            });
	            $('#cancelamento').removeClass('esconder');
            }
        });
    };
    this.cancelar = function(form){
        $.post(
        	this.url+"?passo=cancelar",
        	form.serialize()
        ).done(function(data){
            form.addClass('esconder');
            $("#card-cancelar").removeClass('esconder');
            $("#aviso").empty();
            $("#aviso").text(data.msg);
        });
    }
    this.efetuarInscricao = function(form){
        $.post(
        	this.url+"?passo=salvar",
        	form.serialize()
        ).done(function(data){
            $("#card-cancelar").removeClass('esconder');
            $("#detalhes").addClass('esconder');
            $("#aviso-cancelar").empty();
            $("#aviso-cancelar").text(data.msg);
           
        });
    }
    this.quantidadeVagas = function(vagasDisponiveis, idEletiva){
        vagasDisponiveis.empty();
    
        $.ajax({
            url : this.url+"?passo=quantidadeDeInscritos&ideletiva="+idEletiva
        }).done(function(dados){
            $.each(dados, function(key, val){
                var qtd = val.quantidade - val.inscritos;
                if (qtd == 0){
                    vagasDisponiveis.append($("<h4></h4>").text("Não há vagas").addClass("red-text"));

                } else{
                    vagasDisponiveis.append($("<h4></h4>").text("Vagas Disponíveis:   " + qtd).addClass("blue-text"));
                }
                
            });            
        });
    };
}