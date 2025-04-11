<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../classes/NaveEspacialCalculo.php';
require_once __DIR__ . '/../helpers/ConverterTempo.php';

class NaveTest extends TestCase
{
    public function testCalculaParadas()
    {
        //aqui faz o teste de quantas paradas a nave "X-Wing" ira fazer com a disância "1000000"
        $nave = new NaveEspacialCalculo([
            'name' => 'X-Wing',
            'MGLT' => '100',
            'consumables' => '1 week'
        ]);

        // Distância: 1.000.000 MGLT
        $paradas = $nave->calcularParadas(1000000);
        
        $this->assertEquals(59, $paradas);
    }

    public function testNaveSemDadosDeCombustivel()
    {
        $nave = new NaveEspacialCalculo([
            'name' => 'Unknown Ship',
            'MGLT' => 'unknown',
            'consumables' => 'unknown'
        ]);

        $this->assertNull($nave->calcularParadas(1000000));
    }
}
