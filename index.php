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
    <?php include 'tema/header.php';?>
    

    <main>

        <form action="gravar.php">
            <div>
            <label for="nome_anuncio" class="form-label">Nome do Anúncio</label>
            <input type="text"  class="form-control" id="nome_anuncio" name="nome_anuncio" required>
            
            </div>

            <div>
                <label for="nome_cliente" class="form-label">Cliente</label>
                <input type="text"  class="form-control" id="nome_cliente" name="nome_cliente" required>
            </div>

            <div>
                <label for="data_inicio" class="form-label">Data de Início</label>
                <input type="date"  class="form-control" id="data_inicio" name="data_inicio" required>
            </div>

            <div>
                <label for="data_final" class="form-label">Data de Término</label>
                <input type="date"  class="form-control" id="data_final" name="data_final" required>
            </div>

            <div>
                <label for="valorinvestido" class="form-label">Investimento por Dia</label>
                <input type="number" step="0.01" class="form-control" id="valorinvestido" name="valor_investido" required>
            </div>

            

            <button type="submit" class="botaoenviar">Projeção</button>

          </form>

    </main>

    <?php include 'tema/footer.php';?>

</body>

</html>