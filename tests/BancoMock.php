<?php

namespace Tests\OpenBoleto;

use OpenBoleto\BoletoAbstract;

class BancoMock extends BoletoAbstract
{
    protected $carteiras = ['10'];
    /**
     * @var string
     */
    protected $logoBanco = 'bb.jpg';

    /**
     * Código do banco
     * @var string
     */
    protected $codigoBanco = '001';

    /**
     * Retorna o sequencial como nosso número
     *
     * @return int|string
     */
    public function gerarNossoNumero()
    {
        return $this->getSequencial();
    }

    /**
     * Retorna 1 * 25
     *
     * @return string
     */
    public function getCampoLivre()
    {
        return str_repeat('1', 25);
    }
}
