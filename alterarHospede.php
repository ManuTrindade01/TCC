<?php
require_once("verificaAutenticacao.php");
//1. Conectar no BD (IP, usuario, senha, nome do banco)
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');
function validarCPF($cpf)
{
  // Remove caracteres não numéricos
  $cpf = preg_replace('/[^0-9]/', '', $cpf);

  // Verifica se o CPF possui 11 dígitos
  if (strlen($cpf) != 11) {
    return false;
  }

  // Verifica se todos os dígitos são iguais
  if (preg_match('/(\d)\1{10}/', $cpf)) {
    return false;
  }

  // Calcula o primeiro dígito verificador
  $soma = 0;
  for ($i = 0; $i < 9; $i++) {
    $soma += $cpf[$i] * (10 - $i);
  }
  $resto = $soma % 11;
  $digito1 = ($resto < 2) ? 0 : 11 - $resto;

  // Calcula o segundo dígito verificador
  $soma = 0;
  for ($i = 0; $i < 10; $i++) {
    $soma += $cpf[$i] * (11 - $i);
  }
  $resto = $soma % 11;
  $digito2 = ($resto < 2) ? 0 : 11 - $resto;

  // Verifica se os dígitos verificadores estão corretos
  if ($cpf[9] == $digito1 && $cpf[10] == $digito2) {
    return true;
  } else {
    return false;
  }
}

if (isset($_POST['salvar'])) {
  $cpf = $_POST["cpf"];

  if (!validarCPF($cpf)) {
    $mensagemErro = "CPF inválido!";
} else {

      $id = $_POST['id'];
  $nome = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $dataNascimento = $_POST['dataNascimento'];
  $genero = $_POST['genero'];
  $estado = $_POST['estado'];
  $cidade = $_POST['cidade'];
  $endereco = $_POST['endereco'];
  $numeroEndereco = $_POST['numeroEndereco'];
  $cep = $_POST['cep'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $contatoEmergencia = $_POST['contatoEmergencia'];

  //3. Preparar a SQL
  $sql = "UPDATE hospede
                set nome  = '$nome',
                    cpf = '$cpf',
                    dataNascimento = '$dataNascimento',
                    genero = '$genero',
                    estado = '$estado',
                    cidade = '$cidade',
                    endereco = '$endereco',
                    numeroEndereco = '$numeroEndereco',
                    cep = '$cep',
                    email = '$email',
                    telefone = '$telefone',
                    contatoEmergencia = '$contatoEmergencia'
                where id  = $id";
                

  //4. Executar a SQL
  mysqli_query($conexao, $sql);

  //5. Mostrar uma mensagem ao usuário
  $mensagem = "Registro salvo com sucesso.";


}
}

//Busca usuário selecionado pelo "listarHospedes.php"
$sql = "SELECT * from hospede where id = " . $_GET['id'];
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);

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

<title>Alterar Hóspede</title>
<div class="container p-4">
  <div class="card">
    <div class="card-header">
      <h2>Alterar Hóspede</h2>
    </div>
    <div class="card-body">
      <?php if (isset($mensagem)) { ?>
        <div class="alert alert-success" role="alert">
          <i class="fa-solid fa-square-check"></i>
          <?= $mensagem ?>
        </div>
      <?php } ?>
      <?php if (isset($mensagemErro)) { ?>
          <div class="alert alert-warning" role="alert">
            <i class="fa-solid fa-square-check"></i>
            <?= $mensagemErro ?>
          </div>
        <?php } ?>


      <form method="post">
        <input type="hidden" name="id" value="<?= $linha['id'] ?>">
        <div class="row">
          <div class="mb-3 col-md-4">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" value="<?= $linha['nome'] ?>">
          </div>
          <div class="mb-3 col-md">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" class="form-control" name="cpf" id="cpf" value="<?= $linha['cpf'] ?>">

          </div>
          <div class="mb-3 col-md">
            <label for="dataNascimento" class="form-label">Data de Nascimento:</label>
            <input name="dataNascimento" type="date" class="form-control" value="<?= $linha['dataNascimento'] ?>">
          </div>
          <div class="mb-3 col-md">
            <label for="genero" class="form-label">Gênero:</label>
            <select name="genero" class="form-select" aria-label="Default select example">
              <option value="F" <?= ($linha['genero'] == "F") ? "selected" : "" ?>>Feminino</option>
              <option value="M" <?= ($linha['genero'] == "M") ? "selected" : "" ?>>Masculino</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col-md">
            <label for="cep" class="form-label">CEP:</label>
            <input name="cep" type="text" id="cep" class="form-control" value="<?= $linha['cep'] ?>" id="cep">
          </div>
          <div class="mb-3 col-md">
            <label for="estado" class="form-label">UF:</label>
            <input name="estado" type="text" id="uf" class="form-control" value="<?= $linha['estado'] ?>">
          </div>
          <div class="mb-3 col-md">
            <label for="cidade" class="form-label">Cidade:</label>
            <input name="cidade" type="text" class="form-control" value="<?= $linha['cidade'] ?>">
          </div>
          <div class="mb-3 col-md">
            <label for="bairro" class="form-label">Bairro:</label>
            <input name="bairro" type="text" class="form-control" value="<?= $linha['bairro'] ?>">
          </div>
          <div class="mb-3 col-md-4">
            <label for="endereco" class="form-label">Endereço:</label>
            <input name="endereco" type="text" class="form-control" value="<?= $linha['endereco'] ?>">
          </div>
          <div class="mb-3 col-md">
            <label for="numeroEndereco" class="form-label">Número:</label>
            <input name="numeroEndereco" type="number" class="form-control" value="<?= $linha['numeroEndereco'] ?>">
          </div>
        </div>
    <div class="row">
      <div class="mb-3 col-md">
        <label for="email" class="form-label">Email:</label>
        <input name="email" type="email" class="form-control" value="<?= $linha['email'] ?>">
      </div>
      <div class="mb-3 col-md">
        <label for="telefone" class="form-label">Telefone:</label>
        <input name="telefone" type="text" class="form-control" value="<?= $linha['telefone'] ?>" id="telefone">
      </div>
      <div class="mb-3 col-md">
        <label for="contatoEmergencia" class="form-label">Contato de Emergência:</label>
        <input name="contatoEmergencia" type="text" class="form-control" value="<?= $linha['contatoEmergencia'] ?>"
          id="contatoEmergencia">
      </div>
    </div>


  <button name="salvar" type="submit" class="btn" style="background-color: #a70162; color: #fff"><i
      class="fa-solid fa-check"></i> Salvar</button>

  <a href="listarHospedes.php" type="submit" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i></i>
    Voltar</a>
  </button>

  </form>
</div>

</div>
<script type="text/javascript" src="js/app.js"></script>


<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
  integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
  integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $('#cpf').mask('000.000.000-00', { reverse: true });
  $('#telefone').mask('(00) 00000-0000');
  $('#contatoEmergencia').mask('(00) 00000-0000');
  $('#cep').mask('00000-000');
</script>
<script>
  // Função para exibir a mensagem de confirmação
  window.onbeforeunload = function () {
    return "Você tem certeza que deseja sair desta página? Suas informações não serão salvas.";
  };

  // Lógica para remover a mensagem de confirmação quando o formulário for enviado
  document.querySelector('form').addEventListener('submit', function () {
    window.onbeforeunload = null;
  });
</script>
</body>

</html>