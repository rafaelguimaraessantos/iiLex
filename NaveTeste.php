<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../classes/NaveEspacial.php';
require_once __DIR__ . '/../helpers/ConverterTempo.php';

class NaveTest extends TestCase
{
    public function testCalculaParadas()
    {
        $nave = new NaveEspacial([
            'name' => 'X-Wing',
            'MGLT' => '100',
            'consumables' => '1 week'
        ]);

        // Distância: 1.000.000 MGLT
        $paradas = $nave->calcularParadas(1000000);
        $this->assertEquals(142, $paradas);
    }

    public function testNaveSemDadosDeCombustivel()
    {
        $nave = new NaveEspacial([
            'name' => 'Unknown Ship',
            'MGLT' => 'unknown',
            'consumables' => 'unknown'
        ]);

        $this->assertNull($nave->calcularParadas(1000000));
    }
}
