<?php

class Cliente {

    protected $nome;
    protected $anuncios = [];
    
    public function __construct( $nome){
        
        $this->nome = $nome;
        
    }

    public function adicionarAnuncio(Anuncio $anuncio){

        $this->anuncios[] = $anuncio;

    }

}

