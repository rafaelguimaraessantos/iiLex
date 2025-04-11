<?php
require_once 'classes/ServicoSwapi.php';
require_once 'helpers/ConverterTempo.php';

// Verifica se a distância foi enviada via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['distancia'])) {
    $distancia = intval($_POST['distancia']);

    if ($distancia <= 0) {
        exit("Informe uma distância válida em MGLT.\n");
    }

    // Cria instância do serviço Swapi e obtém as naves
    $swapi = new ServicoSwapi();
    $naves = $swapi->obterTodasNaves();

    // Exibe os resultados das paradas para cada nave
    foreach ($naves as $nave) {
        $paradas = $nave->calcularParadas($distancia);
        echo "{$nave->nome}: " . ($paradas === null ? "N/A" : $paradas) . " paradas<br>";
    }
} else {
    // Se o formulário ainda não foi enviado, exibe o formulário
    echo '
    <form method="POST" action="">
        <label for="distancia">Informe a distância em MGLT:</label>
        <input type="number" name="distancia" id="distancia" required>
        <button type="submit">Calcular</button>
    </form>
    ';
}
?>
