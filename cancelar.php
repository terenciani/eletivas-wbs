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
  
  <nav>
    <div class="nav-wrapper red">
        <a href="#" class="brand-logo center">Cancelar Inscrição</a>  
    </div>  
  </nav>
  
  
    <br />
  <div class="container">
    <div class="row center">
      <form class="center form-cancelar" id="formCancelar" onsubmit="return false">
        <div class="row center">
          <div class="input-field col s12">
            <input id="matricula" type="text" class="validate" name="matricula" required>
            <label for="matricula">Digite o seu código do aluno</label>
          </div>
        </div>
        
        
        <div class="row esconder center" id="detalhes">
          <div class="row col s12 center">
            <div class="card-panel" >
              <span class="black-text" id="detalhes-inscricao">
              </span>
            </div>
          </div>
        </div>
        <div class="row center" id="div-senha">
	          <div class="input-field col s12">
	            <input id="senha" type="password" class="validate" name="senha" required>
	            <label for="senha">Digite sua senha para cancelar</label>
	          </div>
	        </div>
        <div class="row esconder center" id="cancelamento">
          
          <div class="row center">
	          <div class="input-field col s12">
	            <button class="btn waves-effect waves-light red" id="btn-cancelar" type="submit">Cancelar Inscrição
	              
	            </button>
	          </div>
	        </div>
        </div>
        
      </form>
      <div class="row esconder" id="card-cancelar">
        <div class="col s12">
          <div class="card blue-grey darken-1 center form-cancelar">
            <div class="card-content white-text">
              <span class="card-title">Aviso</span>
              <p id="aviso"></p>
            </div>
            
          </div>
        </div>
      </div>

      <div class="col s12 center">
        <a href="index.php" class="waves-effect waves-light btn">Clique aqui para voltar</a>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/inscricao.js"></script>
  <script src="js/initcancelar.js"></script>

</body>
</html>
