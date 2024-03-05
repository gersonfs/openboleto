<?php

namespace Tests\OpenBoleto;


use OpenBoleto\Agente;
use PHPUnit\Framework\TestCase;

class BoletoAbstractTest extends TestCase
{
    /**
     * @return void
     */
    public function testInstantiateShouldSetDefaultResourcePath()
    {
        $bank = new BancoMock();
        $this->assertTrue(file_exists($bank->getResourcePath()));
    }

    /**
     * @return void
     */
    public function testShouldReturnUserResourcePathIfPassed()
    {
        $bank = new BancoMock(['resourcePath' => __DIR__]);
        $this->assertEquals(__DIR__, $bank->getResourcePath());
    }

    /**
     * @return void
     */
    public function testInvalidCarteiraExceptionsShouldBeThrown()
    {
        $this->expectException(\OpenBoleto\Exception::class);
        new BancoMock([
            'carteira' => 99,
        ]);
    }

    /**
     * @return void
     */
    public function testValidCarteiraShouldWork()
    {
        $instance = new BancoMock([
            'carteira' => 10,
        ]);

        $this->assertInstanceOf(\OpenBoleto\BoletoAbstract::class, $instance);
    }

    public function testGetOutput(): void
    {
        $sacado = new Agente('Fernando Maia', '023.434.234-34', 'ABC 302 Bloco N', '72000-000', 'Brasília', 'DF');
        $cedente = new Agente('Empresa de cosméticos LTDA', '02.123.123/0001-11', 'CLS 403 Lj 23', '71000-000', 'Brasília', 'DF');

        $banco = new BancoMock([
            'dataVencimento' => new \DateTime('2013-01-24'),
            'valor' => 23.00,
            'sequencial' => 1234567,
            'sacado' => $sacado,
            'cedente' => $cedente,
            'agencia' => 1724, // Até 4 dígitos
            'carteira' => 10,
            'conta' => 10403005, // Até 8 dígitos
            'convenio' => 1234, // 4, 6 ou 7 dígitos
            'contaDv' => 2,
            'agenciaDv' => 1,
            'descricaoDemonstrativo' => [ // Até 5
                'Compra de materiais cosméticos',
                'Compra de alicate',
            ],
            'instrucoes' => [ // Até 8
                'Após o dia 30/11 cobrar 2% de mora e 1% de juros ao dia.',
                'Não receber após o vencimento.',
            ],
        ]);

        $output = $banco->getOutput();
        $this->assertIsString($output);
    }
}
