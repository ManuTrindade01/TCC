<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");

//Exclusão //
if (isset($_GET['id'])) { //Verifica se foi clicado no botão excluir
  $sql = "DELETE FROM quarto where id = " . $_GET['id'];
  mysqli_query($conexao, $sql);

  $mensagem = "Exclusão realizada com sucesso";

}
$V_WHERE = " ";
//Geração SQL dinãmica para relatório
if (isset($_POST['pesquisar'])) {
  $V_WHERE = " AND numero like '%" . $_POST['numero'] . "%' ";
}

//2. Preparar a SQL
$sql = "SELECT * FROM quarto
        WHERE 1 = 1 " . $V_WHERE;

//3. Executar a SQL
$resultado = mysqli_query($conexao, $sql);

?>

<?php require_once("cabecalho.php"); ?>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="barbara.ico" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b78968e6be.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital@1&family=Sorts+Mill+Goudy&family=Unna:ital@1&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
        integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
   <link href="css/style.css" rel="stylesheet">
<div class="container">
<!--Bloco de mensagem-->
<?php if (isset($mensagem)) { ?>
  <div class="alert alert-success" role="alert">
    <i class="fa-solid fa-square-check"></i>
    <?= $mensagem ?>
  </div>
<?php } ?>
<title>Listar Quartos</title>
<div class="card mt-3 mb-3">
  <div class="card-body">
    <h2 class="card-title">Quartos cadastrados
      <a href="cadastrarQuarto.php" class="btn btn-sn" style="background-color: #a70162; color: #fff;"><i
          class="fa-solid fa-plus"></i>
      </a>
    </h2>
  </div>
</div>


<form method="post">
  <div class="input-group mb-3">
    <input type="text" name="numero" id="numero" class="form-control" placeholder="Pesquisar por número"
      aria-label="Recipient's username" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button name="pesquisar" class="btn" style="background-color: #a70162; color: #fff;" type="submit"><i
          class="fa-solid fa-magnifying-glass"></i> </button>
</form>
</div>
</div>


<div class="table-responsive">
<table class="table table-danger table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Número</th>
      <th scope="col">Tipo</th>
      <th scope="col">Capacidade</th>
      <th scope="col">Diária</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
      <tr>
        <td>
          <?= $linha['id'] ?>
          </th>
        <td>
          <?= $linha['numero'] ?>
        </td>
        <td>
          <?= $linha['tipo'] ?>
        </td>
        <td>
          <?= $linha['capacidade'] ?>
        </td>
        <td>R$
            <?= number_format($linha['valorDiaria'], 2, ',', '.') ?>
          </td>
        
        <td>
      <div class="btn-group">
          <a href="alterarQuarto.php?id=<?= $linha['id'] ?>" class="btn btn-warning">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
          <!--BOTÃO EXCLUIR-->

          <a href="listarQuarto.php?id=<?= $linha['id'] ?>" class="btn btn-danger"
            onclick="return confirm('Confirma exclusão')">
            <i class="fa-solid fa-trash-can"></i>
          </a>
          </div>
        </td>


      </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</div>
</body>

</html>