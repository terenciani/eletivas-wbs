function turma(){
    
    this.url = "service/cliente.service.php";
    
    this.listarClientes = function(tbody){
        
        tbody.empty();
        
        $.ajax({
            url : this.url
        }).done(function(dados){
            
            $.each(dados, function(key, val){
                
                tr = $("<tr />");
                
                tr.append($("<td />").text(val.idcliente));
                tr.append($("<td />").text(val.clientenome));
                tr.append($("<td />").text(val.clienteidade));
                
                var btnAlterar = $("<a />").attr({
                    class : "btn-floating right",
                    title : "Alterar registro",
                    href : "#modalAlterar"
                });
                
                icone = $("<i />").attr("class", "mdi-content-create");
                btnAlterar.append(icone);
                
                btnAlterar.click(function(){
                    cliente.abrirAlteraCliente(val.idcliente, $("#formAlteraCliente"));
                });
                
                var btnExcluir = $("<a />").attr({
                    class : "btn-floating right excluirCliente",
                    title : "Excluir cliente",
                    href : "#"
                });
                
                icone = $("<i />").attr("class", "mdi-content-clear");
                btnExcluir.append(icone);
                
                btnExcluir.click(function(){
                    cliente.excluir(val.idcliente);
                });
                
                tdBotoes = $("<td />");
                
                tdBotoes.append(btnAlterar);
                tdBotoes.append(btnExcluir);
                
                tr.append(tdBotoes);
                
                tbody.append(tr);
                
            });
            
        });
    };
    
    this.excluir = function(idcliente){
        if(confirm("Tem certeza que deseja excluir?")){
            $.ajax({
                url : this.url+"?passo=excluir&idcliente="+idcliente
            }).done(function(){
                cliente.listarClientes(tblClientes.find("tbody"));
            });
        }
    }
    
    this.cadastrar = function(form){
        $.post( this.url+"?passo=cadastrar", form.serialize() ).done(function(data){
            
            if(!data.erro){
                form.each(function(){
                    this.reset();
                });
                
                $("#modalCadastro").closeModal();
            }
            
            alert(data.msg);
            
            cliente.listarClientes(tblClientes.find("tbody"));
            
        });
    }
    
    this.abrirAlteraCliente = function(idcliente, form){
        $("#cp_idcliente").val(idcliente);
        
        $.ajax({
            url : this.url+"?passo=dadosCliente&idcliente="+idcliente
        }).done(function(data){
            $("#cpalterar_clientenome").val(data[0].clientenome);
            $("#cpalterar_clienteidade").val(data[0].clienteidade);
            
            $("#modalAlterar").openModal();
        });
        
    };
    
    this.executaAlteracao = function(form){
        $.post( this.url+"?passo=alterar", form.serialize() ).done(function(data){
            
            if(!data.erro){
                form.each(function(){
                    this.reset();
                });
                
                $("#modalAlterar").closeModal();
            }
            
            alert(data.msg);
            
            cliente.listarClientes(tblClientes.find("tbody"));
            
        });
    }
    
}