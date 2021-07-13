<?php

class Anuncio
{
    const CUSTO_VISUALIZACAO_PESSOA = 0.03;
    const PORCENTAGEM_VISUALIZACOES_CLIQUES = 0.12;
    const PORCENTAGEM_COMPARTILHAMENTO_SOCIAL = 0.15;
    const VISUALIZACOES_POR_COMPARTILHAMENTO = 40;

    protected $nome;
    protected $dataFinal;
    protected $dataInicial;
    protected $investimentoDia;

    public function __construct($nome, $dataFinal, $dataInicial, $investimentoDia)
    {
        $this->nome = $nome;
        $this->dataInicial = new DateTime($dataInicial);
        $this->dataFinal = new DateTime($dataFinal);
        $this->investimentoDia = $investimentoDia;
    }

    public function calculoValorInvestido()
    {
        $diasrodando = $this->dataInicial->diff($this->dataFinal)->days;

        $valorTotalInvestido = $this->investimentoDia * $diasrodando;

        return $valorTotalInvestido;
    }

    public function visualizacao()
    {
        $visualizacao = $this->calculoValorInvestido() / static::CUSTO_VISUALIZACAO_PESSOA;

        return $visualizacao;
    }

    //calculo dos cliques primarios
    public function cliques()
    {
        $cliques = $this->visualizacao() * static::PORCENTAGEM_VISUALIZACOES_CLIQUES;

        return $cliques;
    }

    //calculo dos compartilhamentos primarios
    public function compartilhamento()
    {
        $compartilhamentos = $this->cliques() * static::PORCENTAGEM_COMPARTILHAMENTO_SOCIAL;

        return $compartilhamentos;
    }

    //calculo das vizualizações geradas apartir de um compartilhamento
    public function visualizacaoGerada($compartilhamentos)
    {

        return $compartilhamentos * static::VISUALIZACOES_POR_COMPARTILHAMENTO;
    }

    public function calculoMetrica()
    {
        $postVisualizacaoGerada = 0;
        $postCompartilhamentosGerado = 0;

        //chamada das funções primarias

        $postVisualizacao = $this->visualizacao();
        $postCliques = $this->cliques();
        $postCompartilhamentos = $this->compartilhamento();

        //todo calculo dos compartilhamentos aqui
        $postCompartilhamentosGerado += $postCompartilhamentos;

        for ($i = 0; $i < 4; $i++) {
            $postVisualizacaoGerada += $this->visualizacaoGerada($postCompartilhamentosGerado);
            $postCliquesGerado = $this->cliques();
            $postCompartilhamentosGerado = $this->compartilhamento();
            $postVisualizacao = $postVisualizacaoGerada;
        }

        $postCliques += $postCliquesGerado;
        $postCompartilhamentos += $postCompartilhamentosGerado;
        $totalVisualizacoes = $postVisualizacao;

        $metrica = [
            'cliques' => $postCliques, 
            'compartilhamentos' =>  $postCompartilhamentos, 
            'visualizacoes' => $totalVisualizacoes
        ];
        
        return $metrica;
    }

}
