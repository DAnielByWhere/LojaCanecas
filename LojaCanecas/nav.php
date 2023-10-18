<nav class="navbar navbar-inverse" style="background-color: #603140">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Loja de Caneca :D</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php"> Home <span class="sr-only">(current)</span></a></li>
        <li><a href="lanc.php"> Lançamentos </a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Categorias <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="categoria.php?cat=Geek"> Geek </a></li>
            <li><a href="categoria.php?cat=Frases"> Frases </a></li>
            <li><a href="categoria.php?cat=Fofinhas"> Fofinhas </a></li>
            <li><a href="categoria.php?cat=Cores solidas"> Cores solidas </li>
            <li><a href="categoria.php?cat=Outros produtos"> Outros Produtos </a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search" name="frmpesquisa" method="get" action="busca.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="O que está buscando?" name="txtbuscar">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Contato</a></li>

        <?php if(empty($_SESSION['ID'])) { ?>
        <li><a href="formlogon.php"><span class="glyphicon glyphicon-log-in"> Logon</a></li>
        <?php } else { 
        if($_SESSION['Status'] == 0){
          $consulta_usuario = $cn->query("select NomeUsu from tbUsuario where CodUsu = '$_SESSION[ID]'");
          $exibe_usuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC); 
          ?>
          <li><a href="#"><span class="glyphicon glyphicon-user"> <?php echo $exibe_usuario['NomeUsu']?></a></li>
          <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"> Logoff</a></li>
          <?php } else { ?>
            <li><a href="adm.php"><button class="btn btn-sm btn-danger">Administrador</button></a></li>
            <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"> Logoff</a></li>
          <?php } ?>
        <?php } ?>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>