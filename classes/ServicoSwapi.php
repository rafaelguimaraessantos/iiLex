<?php
    require_once 'NaveEspacialCalculo.php';

    class ServicoSwapi {
        private $baseUrl = 'https://swapi.dev/api/starships/';

        public function obterTodasNaves() {
            $naves = [];
            $url = $this->baseUrl;
            // var_dump($url);
            // die('teste');
            do {
                $resposta = file_get_contents($url);
                $dados = json_decode($resposta, true);

                foreach ($dados['results'] as $naveData) {
                    $naves[] = new NaveEspacialCalculo($naveData);
                }

                $url = $dados['next'];
            } while ($url);

            return $naves;
        }
    }
?>