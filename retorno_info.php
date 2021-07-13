<?php

    require_once 'database/conexao_banco.php';
    require 'php/Anuncio.php';
    $id_cliente = $_REQUEST['id'];

    $resultado_anuncio = $pdo->prepare('select nome, data_inicio, data_final, valor_investido from anuncios where cliente_id = ?');
    $resultado_anuncio->execute([$id_cliente]);
    $resultado = $resultado_anuncio->fetch(PDO::FETCH_ASSOC);

    $nomeAnuncio = $resultado['nome'];
    $dataInicio = $resultado['data_inicio'];
    $dataFinal = $resultado['data_final'];
    $investimentoDia = $resultado['valor_investido'];

    $anuncio = new Anuncio($nomeAnuncio, $dataFinal, $dataInicio, $investimentoDia);

    $investimentoTotal = $anuncio-> calculoValorInvestido();
    
    $metrica = $anuncio->calculoMetrica();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Alcance de  Anúncio</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="tema/css/reset.css">
	<link rel="stylesheet" type="text/css" href="tema/css/estilo.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4ee6fcbd20.js" crossorigin="anonymous"></script>
</head>

<body>
<?php include 'tema/header.php'; ?>

    <main>
        <?php include 'formulario_pesquisa.php';?>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome do Anúncio</th>
      <th scope="col">Data Inicial</th>
      <th scope="col">Data Final</th>
      <th scope="col">Valor Investido</th>
      <th scope="col"> Investimento Total</th>
      <th scope="col">Cliques no post</th>
      <th socope="col">Compartilhamentos</th>
      <th scope="col">Visualizações</th>

    </tr>
  </thead>
  <tbody>
  
    <tr>
      <th scope="row"></th>
      <td><?php echo $resultado['nome'] ?></td>
      <td><?php echo $resultado['data_inicio'] ?></td>
      <td><?php echo $resultado['data_final'] ?></td>
      <td><?php echo $resultado['valor_investido'] ?></td>
      <td><?php echo $investimentoTotal ?></td>
      <td><?php echo $metrica['cliques']  ?></td>
      <td><?php echo $metrica['compartilhamentos']  ?></td>
      <td><?php echo $metrica['visualizacoes']  ?></td>
      <td></td>
    </tr>
  </tbody>
</table>
      
    </main>

    <?php include 'tema/footer.php';?>

</body>

</html>