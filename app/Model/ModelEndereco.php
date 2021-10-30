<?php

/**
 * Description of ModelEndereco
 *
 * @author diego.santos
 */
class ModelEndereco {

    private $sCidade;
    private $sBairro;
    private $sRua;
    private $iNumero;
    private $sComplemento;
    private $iCoordenadas;

    function getICoordenadas() {
        return $this->iCoordenadas;
    }

    function setICoordenadas($iCoordenadas) {
        $this->iCoordenadas = $iCoordenadas;
    }

    function getSCidade() {
        return $this->sCidade;
    }

    function getSBairro() {
        return $this->sBairro;
    }

    function getSRua() {
        return $this->sRua;
    }

    function getINumero() {
        return $this->iNumero;
    }

    function getSComplemento() {
        return $this->sComplemento;
    }

    function setSCidade($sCidade) {
        $this->sCidade = $sCidade;
    }

    function setSBairro($sBairro) {
        $this->sBairro = $sBairro;
    }

    function setSRua($sRua) {
        $this->sRua = $sRua;
    }

    function setINumero($iNumero) {
        $this->iNumero = $iNumero;
    }

    function setSComplemento($sComplemento) {
        $this->sComplemento = $sComplemento;
    }

}
