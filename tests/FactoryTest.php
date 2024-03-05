<?php

namespace Tests\OpenBoleto;
use OpenBoleto\BoletoFactory;
use OpenBoleto\Exception;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    /**
     * @return void
     * @throws \OpenBoleto\Exception
     */
    public function testWhetherLoadByBankIdReturnsTheRightInstance()
    {
        $this->assertInstanceOf(\OpenBoleto\Banco\Abc::class, BoletoFactory::loadByBankId(246));
        $this->assertInstanceOf(\OpenBoleto\Banco\BancoDoBrasil::class, BoletoFactory::loadByBankId(1));
        $this->assertInstanceOf(\OpenBoleto\Banco\BancoDoNordeste::class, BoletoFactory::loadByBankId(4));
        $this->assertInstanceOf(\OpenBoleto\Banco\Banese::class, BoletoFactory::loadByBankId(47));
        $this->assertInstanceOf(\OpenBoleto\Banco\Banrisul::class, BoletoFactory::loadByBankId(41));
        $this->assertInstanceOf(\OpenBoleto\Banco\Bradesco::class, BoletoFactory::loadByBankId(237));
        $this->assertInstanceOf(\OpenBoleto\Banco\Brb::class, BoletoFactory::loadByBankId(70));
        $this->assertInstanceOf(\OpenBoleto\Banco\BV::class, BoletoFactory::loadByBankId(655));
        $this->assertInstanceOf(\OpenBoleto\Banco\C6Bank::class, BoletoFactory::loadByBankId(336));
        $this->assertInstanceOf(\OpenBoleto\Banco\Caixa::class, BoletoFactory::loadByBankId(104));
        $this->assertInstanceOf(\OpenBoleto\Banco\Cecred::class, BoletoFactory::loadByBankId(85));
        $this->assertInstanceOf(\OpenBoleto\Banco\HSBC::class, BoletoFactory::loadByBankId(399));
        $this->assertInstanceOf(\OpenBoleto\Banco\Itau::class, BoletoFactory::loadByBankId(341));
        $this->assertInstanceOf(\OpenBoleto\Banco\Safra::class, BoletoFactory::loadByBankId(422));
        $this->assertInstanceOf(\OpenBoleto\Banco\Santander::class, BoletoFactory::loadByBankId(33));
        $this->assertInstanceOf(\OpenBoleto\Banco\Sicoob::class, BoletoFactory::loadByBankId(756));
        $this->assertInstanceOf(\OpenBoleto\Banco\Sicredi::class, BoletoFactory::loadByBankId(748));
        $this->assertInstanceOf(\OpenBoleto\Banco\Unicred::class, BoletoFactory::loadByBankId(90));
        $this->assertInstanceOf(\OpenBoleto\Banco\Uniprime::class, BoletoFactory::loadByBankId(84));
    }

    /**
     * @return void
     * @throws \OpenBoleto\Exception
     */
    public function testWhetherLoadByBankNameReturnsTheRightInstance()
    {
        $this->assertInstanceOf(\OpenBoleto\Banco\Abc::class, BoletoFactory::loadByBankName('Abc'));
        $this->assertInstanceOf(\OpenBoleto\Banco\BancoDoBrasil::class, BoletoFactory::loadByBankName('BancoDoBrasil'));
        $this->assertInstanceOf(\OpenBoleto\Banco\BancoDoNordeste::class, BoletoFactory::loadByBankName('BancoDoNordeste'));
        $this->assertInstanceOf(\OpenBoleto\Banco\Banese::class, BoletoFactory::loadByBankName('Banese'));
        $this->assertInstanceOf(\OpenBoleto\Banco\Banrisul::class, BoletoFactory::loadByBankName('Banrisul'));
        $this->assertInstanceOf(\OpenBoleto\Banco\Bradesco::class, BoletoFactory::loadByBankName('Bradesco'));
        $this->assertInstanceOf(\OpenBoleto\Banco\Brb::class, BoletoFactory::loadByBankName('Brb'));
        $this->assertInstanceOf(\OpenBoleto\Banco\BV::class, BoletoFactory::loadByBankName('BV'));
        $this->assertInstanceOf(\OpenBoleto\Banco\C6Bank::class, BoletoFactory::loadByBankName('C6Bank'));
        $this->assertInstanceOf(\OpenBoleto\Banco\Caixa::class, BoletoFactory::loadByBankName('Caixa'));
        $this->assertInstanceOf(\OpenBoleto\Banco\CaixaSICOB::class, BoletoFactory::loadByBankName('CaixaSICOB'));
        $this->assertInstanceOf(\OpenBoleto\Banco\Cecred::class, BoletoFactory::loadByBankName('Cecred'));
        $this->assertInstanceOf(\OpenBoleto\Banco\HSBC::class, BoletoFactory::loadByBankName('HSBC'));
        $this->assertInstanceOf(\OpenBoleto\Banco\Itau::class, BoletoFactory::loadByBankName('Itau'));
        $this->assertInstanceOf(\OpenBoleto\Banco\Safra::class, BoletoFactory::loadByBankName('Safra'));
        $this->assertInstanceOf(\OpenBoleto\Banco\Santander::class, BoletoFactory::loadByBankName('Santander'));
        $this->assertInstanceOf(\OpenBoleto\Banco\Sicoob::class, BoletoFactory::loadByBankName('Sicoob'));
        $this->assertInstanceOf(\OpenBoleto\Banco\Sicredi::class, BoletoFactory::loadByBankName('Sicredi'));
        $this->assertInstanceOf(\OpenBoleto\Banco\Unicred::class, BoletoFactory::loadByBankName('Unicred'));
        $this->assertInstanceOf(\OpenBoleto\Banco\Uniprime::class, BoletoFactory::loadByBankName('Uniprime'));
    }

    public function testClassDoesNotExists(): void
    {
        $this->expectException(Exception::class);
        BoletoFactory::loadByBankName('NaoExiste');
    }

    public function testIdDoesNotExists(): void
    {
        $this->expectException(Exception::class);
        BoletoFactory::loadByBankId(9999);
    }
}
