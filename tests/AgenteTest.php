<?php

namespace Tests\OpenBoleto;
use OpenBoleto\Agente;
use PHPUnit\Framework\TestCase;


class AgenteTest extends TestCase
{
    public function testInstantiationWithoutArgumentsShouldWork(): void
    {
        $instance = new Agente('nome','123.456.789-01');
        $this->assertInstanceOf(\OpenBoleto\Agente::class, $instance);
    }

    public function testInstantiationWithFullData(): void
    {
        $instance = new Agente('Fulano de Tal','123.456.789-01', 'Rua do Beco, 45', '95800000', 'Venancio Aires', 'RS');
        $this->assertInstanceOf(\OpenBoleto\Agente::class, $instance);
        $this->assertEquals('Fulano de Tal', $instance->getNome());
        $this->assertEquals('123.456.789-01', $instance->getDocumento());
        $this->assertEquals('Rua do Beco, 45', $instance->getEndereco());
        $this->assertEquals('95800000', $instance->getCep());
        $this->assertEquals('Venancio Aires', $instance->getCidade());
        $this->assertEquals('RS', $instance->getUf());
        $this->assertEquals('95800000 - Venancio Aires - RS', $instance->getCepCidadeUf());
        $this->assertEquals('CPF', $instance->getTipoDocumento());
        $this->assertEquals('Fulano de Tal / CPF: 123.456.789-01', $instance->getNomeDocumento());
    }

    public function testInstantiateWhithFullLegalPersonData(): void
    {
        $instance = new Agente('Fulano de Tal','37.812.868/0001-04', 'Rua do Beco, 45', '95800000', 'Venancio Aires', 'RS');
        $this->assertInstanceOf(\OpenBoleto\Agente::class, $instance);
        $this->assertEquals('Fulano de Tal', $instance->getNome());
        $this->assertEquals('37.812.868/0001-04', $instance->getDocumento());
        $this->assertEquals('Rua do Beco, 45', $instance->getEndereco());
        $this->assertEquals('95800000', $instance->getCep());
        $this->assertEquals('Venancio Aires', $instance->getCidade());
        $this->assertEquals('RS', $instance->getUf());
        $this->assertEquals('95800000 - Venancio Aires - RS', $instance->getCepCidadeUf());
        $this->assertEquals('CNPJ', $instance->getTipoDocumento());
        $this->assertEquals('Fulano de Tal / CNPJ: 37.812.868/0001-04', $instance->getNomeDocumento());
    }
}
