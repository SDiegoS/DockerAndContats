<?php

/**
 * Description of ModelLogin
 *
 * @author diego.santos
 */
class ModelLogin {

    private $sUsername;
    private $sEntrar;
    private $sSenha;
    private $sConteudo;
    private $sNomeCookie;
    private $aUsuarioSessao;

    function getAUsuarioSessao() {
        return $this->aUsuarioSessao;
    }

    function setAUsuarioSessao($aUsuarioSessao) {
        $this->aUsuarioSessao = $aUsuarioSessao;
    }

    function getSUsername() {
        return $this->sUsername;
    }

    function getSEntrar() {
        return $this->sEntrar;
    }

    function getSSenha() {
        return $this->sSenha;
    }

    function getSConteudo() {
        return $this->sConteudo;
    }

    function getSNomeCookie() {
        return $this->sNomeCookie;
    }

    function setSUsername($sUsername) {
        $this->sUsername = $sUsername;
    }

    function setSEntrar($sEntrar) {
        $this->sEntrar = $sEntrar;
    }

    function setSSenha($sSenha) {
        $this->sSenha = $sSenha;
    }

    function setSConteudo($sConteudo) {
        $this->sConteudo = $sConteudo;
    }

    function setSNomeCookie($sNomeCookie) {
        $this->sNomeCookie = $sNomeCookie;
    }

}
