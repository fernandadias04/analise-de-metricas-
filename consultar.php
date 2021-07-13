<?php 

include 'database/conexao_banco.php';
if(!empty($_REQUEST['nome_empresa'])){
  $pesquisa = $pdo->prepare('select nome, id from clientes where nome = ?  ');
  $pesquisa->execute([$_REQUEST['nome_empresa']], );
}else {
  $pesquisa = $pdo->prepare('select nome, id from clientes');
  $pesquisa->execute();
}



?> 

<!DOCTYPE html>
<html>
<head>
    <title>Alcance de  Anúncio</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="reset.css">
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
      <th scope="col">Nome do Cliente</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($pesquisa->fetchAll(PDO::FETCH_ASSOC) as $resultado): ?>
    <tr>
      <th scope="row"><?php echo $resultado['id'] ?></th>
      <td><?php echo $resultado['nome'] ?></td>
      
      <td></td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>
    </main>

    <?php include 'tema/footer.php';?>

</body>

</html>


