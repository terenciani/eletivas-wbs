function turma(){
    
    this.url = "service/turma.service.php";
    
    this.listarTudo = function(tbody){
        
        tbody.empty();
        
        $.ajax({
            url : this.url+"?passo=listarTudo"
        }).done(function(dados){
            
            $.each(dados, function(key, val){
                
                tr = $("<tr />");
                
                tr.append($("<td />").text(val.nome_turma));
                tr.append($("<td />").text(val.primeiro_tempo));
                tr.append($("<td />").text(val.segundo_tempo));
                tr.append($("<td />").text(val.terceiro_tempo));
                tr.append($("<td />").text(val.quarto_tempo));
                tr.append($("<td />").text(val.quinto_tempo));
                tr.append($("<td />").text(val.sexto_tempo));
                tr.append($("<td />").text(val.setimo_tempo));
                tr.append($("<td />").text(val.oitavo_tempo));
                tr.append($("<td />").text(val.nono_tempo));                
                tbody.append(tr);                
            });            
        });
    };    
}