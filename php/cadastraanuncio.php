<?php 

//estima-se que cada pessoa custa R$0.03 e 100 pessoas custam R$3.30;
//estima-se que 12% das pessoas clicam nos anuncios;
//estima-se que 15% das pessoas compartilham em suas redes sociais;

define('CUSTO_VISUALIZACAO_PESSOA', 0.03);
define('PORCENTAGEM_VISUALIZACOES_CLIQUES', 0.12);
define('PORCENTAGEM_COMPARTILHAMENTO_SOCIAL', 0.15);
define('VISUALIZACOES_POR_COMPARTILHAMENTO', 40);


//pessoas que viram o anuncio
$postVisualizacao = 0; 

//vizualizações geradas apartir de um compartilhamento
$postVisualizacaoGerada=0;

//compartilhamentos que o anuncio teve
$postCompartilhamentos = 0; 

//compartilhamentos que o anuncio teve apartir de um compartilhamento
$postCompartilhamentosGerado = 0;

//cliques que o anuncio teve
$postCliques = 0; 

//cliques que o anuncio teve apartir de um compartilhamento
$postCliquesGerado = 0; 

//visualizações geradas com base no valor investido
function Visualizacao($valorAnuncio)
{
    $visualizacao = $valorAnuncio / CUSTO_VISUALIZACAO_PESSOA;

    return $visualizacao;
}

//calculo dos cliques primarios
function Cliques($visualizacao)
{
    $cliques = $visualizacao * PORCENTAGEM_VISUALIZACOES_CLIQUES;

    return $cliques;
}

//calculo dos compartilhamentos primarios
function Compartilhamento($cliques)
{
    $compartilhamentos = $cliques * PORCENTAGEM_COMPARTILHAMENTO_SOCIAL;

    return $compartilhamentos;
}

//calculo das vizualizações geradas apartir de um compartilhamento
function VisualizacaoGerada($compartilhamentos)
{

    return $compartilhamentos * VISUALIZACOES_POR_COMPARTILHAMENTO;
}


//chamada das funções primarias

$postVisualizacao = Visualizacao($valorAnuncio);
$postCliques = Cliques($postVisualizacao);
$postCompartilhamentos = Compartilhamento($postCliques);


//todo calculo dos compartilhamentos aqui

$postCompartilhamentosGerado += $postCompartilhamentos;


for ($i=0; $i<4; $i++)
{
    $postVisualizacaoGerada +=  VisualizacaoGerada($postCompartilhamentosGerado);
    $postCliquesGerado = Cliques($postVisualizacaoGerada);
    $postCompartilhamentosGerado = Compartilhamento($postCliquesGerado);
    $postVisualizacao = $postVisualizacaoGerada;
}

$postCliques += $postCliquesGerado;
$postCompartilhamentos += $postCompartilhamentosGerado;
$totalVisualizacoes = $postVisualizacao;




    


    






    

