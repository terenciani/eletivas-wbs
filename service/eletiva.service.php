<?php
    require('Db.class.php');
    $db = new Db;

    $passo = (isset($_GET['passo'])) ? $_GET['passo'] : 'listar';

    switch($passo){
        case 'detalhesEletiva' : { detalhesEletiva($db); break; }
        case 'quantidadeDeInscritos' : { quantidadeDeInscritos($db); break; }
        default : { listarEletivas($db); break; }
    }

    function detalhesEletiva($db){
        $ideletiva = (int)$_GET['ideletiva'];
        
        $sql = sprintf('SELECT 
                            *
                        FROM 
                            tb_eletiva
                        WHERE 
                            id_eletiva = :IDELETIVA');
        $consulta = $db->con->prepare($sql);
        $consulta->bindParam(':IDELETIVA', $ideletiva);
        $consulta->execute();
        
        response($consulta->fetchAll(PDO::FETCH_ASSOC));
    }
    function listarEletivas($db){

        $sql = sprintf('SELECT 
                            id_eletiva,
                            nome
                        FROM
                            tb_eletiva
                        WHERE
                            ativa=1');
        
        $consulta = $db->con->prepare($sql);
        $consulta->execute();
        
        response($consulta->fetchAll(PDO::FETCH_ASSOC));
    }

    function quantidadeDeInscritos($db){
        $ideletiva = (int)$_GET['ideletiva'];

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
        $consulta->bindParam(':IDELETIVA', $ideletiva);
        $consulta->execute();
        
        response($consulta->fetchAll(PDO::FETCH_ASSOC));
    }

    function cadastrarHorario($db){
        $codigoturma    = (int)$_POST['codigoturma'];
        $primeirotempo  = trim($_POST['primeiro_tempo']);
        $segundotempo   = trim($_POST['segundo_tempo']);
        $terceirotempo  = trim($_POST['terceiro_tempo']);
        $quartotempo    = trim($_POST['quarto_tempo']);
        $quintotempo    = trim($_POST['quinto_tempo']);
        $sextotempo     = trim($_POST['sexto_tempo']);
        $setimotempo    = trim($_POST['setimo_tempo']);
        $oitavotempo    = trim($_POST['oitavo_tempo']);
        $nonotempo      = trim($_POST['nono_tempo']);

        if($codigoturma==0){
             response(array(
                "erro"=>true,
                "msg"=>"Selecione a turma"
            ));   
        }
        
        $sql = sprintf('INSERT INTO tb_localizacao
                        (fk_turma, primeiro_tempo, segundo_tempo, terceiro_tempo, quarto_tempo, quinto_tempo, sexto_tempo, setimo_tempo, oitavo_tempo, nono_tempo, ultima_atualizacao)
                        VALUES
                        (:FKTURMA, :PRIMEIRO, :SEGUNDO, :TERCEIRO, :QUARTO, :QUINTO, :SEXTO, :SETIMO, :OITAVO, :NONO, :DATA)');
        $consulta = $db->con->prepare($sql);
        $consulta->bindParam(':FKTURMA', $codigoturma);
        $consulta->bindParam(':PRIMEIRO', $primeirotempo);
        $consulta->bindParam(':SEGUNDO', $segundotempo);
        $consulta->bindParam(':TERCEIRO', $terceirotempo);
        $consulta->bindParam(':QUARTO', $quartotempo);
        $consulta->bindParam(':QUINTO', $quintotempo);
        $consulta->bindParam(':SEXTO', $sextotempo);
        $consulta->bindParam(':SETIMO', $setimotempo);
        $consulta->bindParam(':OITAVO', $oitavotempo);
        $consulta->bindParam(':NONO', $nonotempo);
        $consulta->bindParam(':DATA', $data);

        $consulta->execute();
        
        if($consulta->rowCount()==0){
            
            $retorno = array(
                            "erro"=>true, 
                            "msg" => "Nenhum registro cadastrado"
                            );
            
        } else {
        
            $retorno = array(
                            "erro"=>false, 
                            "msg" => "Registro cadastrado"
                            );
            
        }
        
        response($retorno);
        
    }


    function cadastrarTurma($db){
    
        $turmanome = trim($_POST['turmanome']);
        
        if($turmanome==""){
            response(array(
                "erro"=>true,
                "msg"=>"O nome deve ser preenchido"
            ));
        }
        
        $sql = sprintf('INSERT INTO tb_turma
                        (turmanome)
                        VALUES
                        (:TURMANOME)');
        $consulta = $db->con->prepare($sql);
        $consulta->bindParam(':TURMANOME', $turmanome);
        $consulta->execute();
        
        if($consulta->rowCount()==0){
            
            $retorno = array(
                            "erro"=>true, 
                            "msg" => "Nenhum registro cadastrado"
                            );
            
        } else {
        
            $retorno = array(
                            "erro"=>false, 
                            "msg" => "Registro cadastrado"
                            );
            
        }
        
        response($retorno);
        
    }


    function response($dados){
        header("Content-type: application/json");
        echo json_encode($dados);
        exit;
    }
?>