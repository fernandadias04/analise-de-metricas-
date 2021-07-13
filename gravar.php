<?php

require_once ('php/Anuncio.php');
require_once ('php/Cliente.php');

$nomeCliente = $_REQUEST['nome_cliente'];
$cliente = new Cliente($nomeCliente);

$anuncio = new Anuncio($_REQUEST['nome_anuncio'], $_REQUEST['data_final'] , $_REQUEST['data_inicio'], $_REQUEST['valor_investido']);

include 'database/conexao_banco.php';

$cliente_pdo = $pdo->prepare('insert into clientes (nome) values (?)');
$cliente_pdo->execute([$nomeCliente]);
$cliente_id = $pdo->lastInsertId();

$anuncio_pdo = $pdo->prepare('insert into anuncios (nome, data_final, data_inicio, valor_investido, cliente_id) values (?,?,?,?,?) ');
$anuncio_pdo->execute( [$_REQUEST['nome_anuncio'], $_REQUEST['data_final'] , $_REQUEST['data_inicio'], $_REQUEST['valor_investido'], $cliente_id ]);

header("Location:retorno_info.php?id=$cliente_id");