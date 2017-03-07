<?php
    require('Db.class.php');
    $db = new Db;

    $passo = (isset($_GET['passo'])) ? $_GET['passo'] : 'listar';

    switch($passo){
        case 'detalhesInscricao' : { detalhesInscricao($db); break; }
        case 'cancelar' 		 : { cancelar($db); break; }
        case 'salvar'	 		 : { salvarInscricao($db); break; }
        default : { listarInscricoes($db); break; }
    }

    function detalhesInscricao($db){
        $matricula = (int)$_GET['matricula'];
        
        $sql = sprintf('SELECT 
                            *
                        FROM 
                            tb_inscricao ti
                        INNER JOIN
                        	tb_eletiva te
                        ON
                        	(ti.fk_eletiva=te.id_eletiva)
                        WHERE 
                            matricula = :MATRICULA');
        $consulta = $db->con->prepare($sql);
        $consulta->bindParam(':MATRICULA', $matricula);
        $consulta->execute();
        
        response($consulta->fetchAll(PDO::FETCH_ASSOC));
    }

    function cancelar($db){
        $matricula    = trim($_POST['matricula']);
        $senha		  = trim($_POST['senha']);
        /*$matricula    = "12";
        $senha		  = "21";*/
        
        
        $sql = sprintf('SELECT 
        					matricula,
        					senha
        				FROM
        					tb_inscricao
        				WHERE
        					matricula=:MATRICULA
        				');
        $consulta = $db->con->prepare($sql);
        $consulta->bindParam(':MATRICULA', $matricula);
        $consulta->execute();
        
        if($consulta->rowCount()==0){
            $retorno = array(
                            "erro"=>true, 
                            "msg" => "Matricula não encontrada"
                            );
        } 
        $linha = $consulta->fetch(PDO::FETCH_ASSOC);
        if ($linha['senha']==$senha){
        	$sql = sprintf('DELETE
                        FROM
                            tb_inscricao
                        WHERE
                            matricula=:MATRICULA 
                        AND
                        	senha=:SENHA;
                        ');
        
	        $consulta = $db->con->prepare($sql);
	        $consulta->bindParam(':MATRICULA', $matricula);
	        $consulta->bindParam(':SENHA', $senha);
	        $consulta->execute();
        	if($consulta->rowCount()==0){
	            $retorno = array(
	                            "erro"=>true, 
	                            "msg" => "Inscrição não excluída"
	                            );
	        }else{
	        	$retorno = array(
	                            "erro"=>false, 
	                            "msg" => "Inscrição excluída"
	                            );
	        }
        }
        else {
            $retorno = array(
                            "erro"=>true, 
                            "msg" => "Senha não confere"
                            );
        }
        response($retorno);
        
    }
    function salvarInscricao($db){
    	date_default_timezone_set('America/Campo_Grande');
        $nome		  = trim($_POST['nome']);
        $matricula    = trim($_POST['matricula']);
        $senha		  = trim($_POST['senha']);
        $turma		  = trim($_POST['turma']);
        $eletiva	  = trim($_POST['eletiva']);
       
       	$hoje = date("Y-m-d H:i:s");
       
        $sql = sprintf('SELECT 
        					matricula
        				FROM
        					tb_inscricao
        				WHERE
        					matricula=:MATRICULA
        				');
        $consulta = $db->con->prepare($sql);
        $consulta->bindParam(':MATRICULA', $matricula);
        $consulta->execute();
        
        if($consulta->rowCount()>0){
            $retorno = array(
                            "erro"=>true, 
                            "msg" => "Aluno já cadastrado"
                            );
        } else{
        	$sql = sprintf('SELECT 
                            te.quantidade_vagas as quantidade,
                            COUNT(*) AS inscritos
                        FROM 
                            tb_inscricao ti
                        INNER JOIN
                            tb_eletiva te
                        ON 
                            (ti.fk_eletiva=te.id_eletiva) 
                        WHERE 
                            te.id_eletiva = :IDELETIVA');
	        $consulta = $db->con->prepare($sql);
	        $consulta->bindParam(':IDELETIVA', $eletiva);
	        $consulta->execute();
	        $linha = $consulta->fetch(PDO::FETCH_ASSOC);
	        if (($linha['quantidade'] - $linha['inscritos']) > 0){
	        	


	        	$sql = sprintf('INSERT INTO tb_inscricao
                        (fk_eletiva, matricula, senha, nome, turma, data)
                        VALUES
                        (:FKELETIVA, :MATRICULA, :SENHA, :NOME, :TURMA, :DATA)');
		        $consulta = $db->con->prepare($sql);
		        $consulta->bindParam(':FKELETIVA', $eletiva);
		        $consulta->bindParam(':MATRICULA', $matricula);
		        $consulta->bindParam(':SENHA', $senha);
		        $consulta->bindParam(':NOME', $nome);
		        $consulta->bindParam(':TURMA', $turma);
		        $consulta->bindParam(':DATA', $hoje);
        		$consulta->execute();
        		if($consulta->rowCount()==0){
		            $retorno = array(
		                            "erro"=>true, 
		                            "msg" => "Não foi possível realizar sua inscrição"
		                            );
        		} else {
            		$retorno = array(
                            "erro"=>false, 
                            "msg" => "Inscrição realizada com sucesso"
                            );
            
        		}
	        }else{
	        	 $retorno = array(
	                            "erro"=>true, 
	                            "msg" => "Vagas esgotadas"
	                            );
	        }
        }
        
        
        response($retorno);
        
    }
    function response($dados){
        header("Content-type: application/json");
        echo json_encode($dados);
        exit;
    }
?>