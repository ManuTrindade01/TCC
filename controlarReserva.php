<?php
// Função para retornar o nome do status com base no número
function getStatusName($statusNumber)
{
    switch ($statusNumber) {
        case 1:
            return ['Pendente', 'warning'];
        case 2:
            return ['Em andamento', 'primary'];
        case 3:
            return ['Finalizado', 'success'];
        case 4:
            return ['Cancelado', 'danger'];
        default:
            return ['Status Desconhecido', 'secondary'];
    }
}

require_once("conexao.php");

?>

<!DOCTYPE html>

<head>
    <title>Reservas</title>
    <link href="css/style.css" rel="stylesheet">

    <style>
        /* style.css */

        /* Estilos para o botão de filtragem */
        .filter-button {
            padding: 8px 16px;
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            background-color: #a70162;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .filter-button:hover {
            background-color: #872850;
        }
    </style>
</head>

<?php require_once("cabecalho.php"); ?>

<body>
    <br>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="statusSelect">Filtrar por status:
                    <select name="status" id="statusSelect" class="form-control mr-sm-2">
                        <option value="">Todos</option>
                        <option value="1">Pendente</option>
                        <option value="2">Em andamento</option>
                        <option value="3">Finalizado</option>
                        <option value="4">Cancelado</option>
                    </select>
                </label>
                <label for="dataEntrada">Data de Entrada:
                    <input type="date" id="dataEntrada" name="dataEntrada" class="form-control mr-sm-2">
                </label>

                <label for="dataSaida">Data de Saída:
                    <input type="date" id="dataSaida" name="dataSaida" class="form-control mr-sm-2">
                </label>

                <label for="nome">Nome do Hóspede:
                    <input type="text" id="nome" name="nome" class="form-control mr-sm-2">
                </label>

                <button type="submit" class="filter-button">Filtrar</button>
            </form>
        </div>
    
        <div class="row row-cols 1 row-cols-md-4 g-4">
            <?php
            // Reutilização da variável $conexao do arquivo conexão.php
            $filtroStatus = isset($_GET['status']) ? $_GET['status'] : '';
            $filtroDataEntrada = isset($_GET['dataEntrada']) ? $_GET['dataEntrada'] : '';
            $filtroDataSaida = isset($_GET['dataSaida']) ? $_GET['dataSaida'] : '';
            $filtroNomeHospede = isset($_GET['nome']) ? $_GET['nome'] : '';

            $sql = "SELECT reserva.*, hospede.nome as hospede_nome, quarto.numero as quarto_numero
                    FROM reserva
                    LEFT JOIN hospede ON hospede.id = reserva.id_hospede
                    LEFT JOIN quarto ON quarto.id = reserva.id_quarto
                    WHERE 1";

            if (!empty($filtroStatus)) {
                $sql .= " AND reserva.status = $filtroStatus";
            }

            if (!empty($filtroDataEntrada)) {
                $sql .= " AND reserva.dataEntrada >= '$filtroDataEntrada'";
            }

            if (!empty($filtroDataSaida)) {
                $sql .= " AND reserva.dataSaida <= '$filtroDataSaida'";
            }

            if (!empty($filtroNomeHospede)) {
                $sql .= " AND hospede.nome LIKE '%$filtroNomeHospede%'";
            }

            $sql .= " ORDER BY reserva.dataEntrada ASC";

            $resultado = mysqli_query($conexao, $sql);

            // Verifica se a consulta foi bem-sucedida
            if ($resultado) {
                $reservas = []; // Array para armazenar as reservas
            
                // Armazena os resultados em uma matriz
                while ($linha = mysqli_fetch_array($resultado)) {
                    $reservas[] = $linha;
                }


                // Itera sobre as reservas para exibir os cartões de reserva
                foreach ($reservas as $reserva) {
                    $statusInfo = getStatusName($reserva['status']);
                    $statusText = $statusInfo[0];
                    $statusClass = $statusInfo[1];
                    ?>


                    <div class="col-md">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5 style="color: #a70162; font-family: 'Segoe UI'">QUARTO
                                        <?= $reserva['quarto_numero'] ?>
                                    </h5>

                                    <label class="badge text-bg-<?= $statusClass ?>">
                                        <?= $statusText ?>
                                    </label>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Hóspede:
                                        <?= $reserva['hospede_nome'] ?>
                                    </li>
                                    <li class="list-group-item">Data de entrada:
                                        <?= date('d/m/Y', strtotime($reserva['dataEntrada'])) ?>
                                    </li>
                                    <li class="list-group-item">Data de Saída:
                                        <?= date('d/m/Y', strtotime($reserva['dataSaida'])) ?>
                                    </li>
                                    <li class="list-group-item">Valor Total: R$
                                        <?= number_format($reserva['valorTotalReserva'], 2, ',', '.') ?>
                                    </li>
                                </ul>

                                <a href="alterarReserva.php?id=<?= $reserva['id'] ?>" class="btn btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>Alterar
                                </a>
                                
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "Erro na consulta: " . mysqli_error($conexao);
            }
            ?>
        </div>
    </div>
</body>

</html>
