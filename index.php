<?php
  header("Content-Type: text/html; charset=UTF-8", true);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>EEWBS</title>

  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
    
<body>
  
  <nav class="azul-wbs">
    <div class="container azul-wbs">
      <div class="nav-wrapper azul-wbs row">
          
          <div class="col s10 brand-logo">
            Eletivas 2018
          </div>
          <div class="col s2">
            <a href="#" class="brand-logo right">
            <img src="img/logo.jpg" class="responsive-img" id="logo"> </a>
          </div>
      </div>  
    </div>
  </nav>
  
  
    <br />
  <div class="container">
    <div class="row">
      <form class="col s12" id="formInscricao" onsubmit="return false">
        <div class="row">
          <div class="input-field col s6">
            <input id="nome" type="text" class="validate" name="nome" required>
            <label for="nome">Nome</label>
          </div>
          <div class="input-field col s6">
            <input id="matricula" type="text" class="validate" name="matricula" required>
            <label for="matricula">Código do Aluno</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="senha" type="password" class="validate" name="senha" required>
            <label for="senha">Senha</label>
          </div>
          <div class="input-field col s6">
            <input id="senha-confirmada" type="password" class="validate" name="senha-confirmada" required>
            <label for="senha-confirmada">Confirmar Senha</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <select id="turma" name="turma" class="browser-default" required>
              <option value="" disabled selected>Escolha sua turma</option>
              <option value="1-A">1º Integral - A</option>
              <option value="1-B">1º Integral - B</option>
              <option value="1-C">1º Integral - C</option>
              <option value="1-EMIA">1º - EMII - A</option>
              <option value="1-EMIB">1º - EMII - B</option>
              <option value="1-EMIC">1º - EMII - C</option>
              <option value="2-A">2º - A</option>
              <option value="2-B">2º - B</option>
              <option value="2-C">2º - C</option>
              <option value="2-D">2º - D</option>
              <option value="2-EMIA">2º - EMII - A</option>
              <option value="2-EMIB">2º - EMII - B</option>
              <option value="3-A">3º - A</option>
              <option value="3-EMIA">3º - EMII - A</option>
            </select>
          </div>
          <div class="input-field col s6">
            <select id="eletiva" name="eletiva" class="browser-default" required>
              
            </select>
          </div>
        </div>
        
        <div class="row esconder" id="detalhes">
          <div class="row col s12 center">
            <div class="card-panel" id="div-vagas-disponiveis">
              <span class="white-text" id="vagas-disponiveis">
              </span>
            </div>
          </div>
          <div class="col s6">
            <div class="card-panel">
              <span class="gray-text" id="detalhes-eletiva">
              </span>
            </div>
          </div>
          <div class="col s6">
            <div class="card-panel">
              <span class="gray-text" id="descricao-eletiva">
              </span>
            </div>
          </div>
        </div>


        <div class="row center">
          <div class="input-field col s12">
            <button class="btn waves-effect waves-light green col s12" id="btn-confirmar" type="submit">Efetuar Inscrição
              
            </button>
          </div>
        </div>
      </form>
      
      <div class="row esconder" id="card-cancelar">
          <div class="col s12">
            <div class="card blue-grey darken-1 center form-cancelar">
              <div class="card-content white-text">
                <span class="card-title">Aviso</span>
                <p id="aviso-cancelar"></p>
              </div>
                <button class="btn waves-effect waves-light blue" type="reset" onclick="location.reload();">Tentar novamente
                
                </button>  
              </div>
          </div>
        </div>

      
      <div class="row center">
        <div class="col s6">
          <a href="visualizar.php" class="waves-effect waves-light btn btn-visualizar">Visualizar Inscrição</a>
        </div>
        <div class="col s6">
          <a href="cancelar.php" class="waves-effect waves-light btn btn-visualizar red">Cancelar Inscrição</a>
        </div>
      </div>
    
    </div>
  </div>

  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/eletiva.js"></script>
  <script src="js/inscricao.js"></script>
  <script src="js/init.js"></script>

</body>
</html>
