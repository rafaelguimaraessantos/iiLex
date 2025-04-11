<?php
    class NaveEspacialCalculo {
        public $nome;
        private $mglt;
        private $consumiveis;

        public function __construct($dados) {
            $this->nome = $dados['name'];
            $this->mglt = $dados['MGLT'];
            $this->consumiveis = $dados['consumables'];
        }
        //calcula as paradas de acordo com a distância recebida
        public function calcularParadas($distancia) {
            if ($this->mglt === 'unknown' || $this->consumiveis === 'unknown') {
                return null;
            }

            $horas = ConverterTempo::toHours($this->consumiveis);
            $autonomia = $horas * (int)$this->mglt;

            return intval(floor($distancia / $autonomia));
        }
    }
?>