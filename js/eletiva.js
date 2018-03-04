function eletiva(){
    
    this.url = "service/eletiva.service.php";
    
    this.preencherSelect = function(selectEletiva){
        selectEletiva.empty();
        var primeiraOpcao = $("<option></option>");
        primeiraOpcao.attr("value", " ");
        primeiraOpcao.prop("disabled", true);
        primeiraOpcao.attr("selected", "selected");
        primeiraOpcao.text("Escolha sua Eletiva");
        selectEletiva.append(primeiraOpcao);

        $.get({
            url : this.url
        }).done(function(dados){
            $.each(dados, function(key, val){
                selectEletiva.append($("<option></option>").attr("value", val.id_eletiva).text(val.nome));
            });            
        });
    };    
    this.detalhesEletiva = function(detalhesEletiva, descricaoEletiva, idEletiva){
        detalhesEletiva.empty();
        descricaoEletiva.empty();
    
        $.get({
            url : this.url+"?passo=detalhesEletiva&ideletiva="+idEletiva
        }).done(function(dados){
            $.each(dados, function(key, val){
                detalhesEletiva.append($("<p class='negrito'></p>").text("Eletiva:"));
                detalhesEletiva.append($("<p></p>").text(val.nome));
                detalhesEletiva.append($("<p class='negrito'></p>").text("Professor:"));
                detalhesEletiva.append($("<p></p>").text(val.professor));
                detalhesEletiva.append($("<p class='negrito'></p>").text("Quantidade de Vagas:"));
                detalhesEletiva.append($("<p></p>").text(val.quantidade_vagas));
                descricaoEletiva.append($("<p class='negrito'></p>").text("Descrição:"));
                descricaoEletiva.append($("<p></p>").text(val.descricao));
            });            
        });
    };
    this.quantidadeVagas = function(vagasDisponiveis, idEletiva, turma){
        vagasDisponiveis.empty();
    
        $.ajax({
            url : this.url+"?passo=quantidadeDeInscritos&ideletiva="+idEletiva+"&turma="+turma
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