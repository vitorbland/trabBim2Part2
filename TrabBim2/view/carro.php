<?php 
include "../dao/CarroDao.php";
include "../dao/ConnectionFactory.php";
include "../model/Carro.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Carro</title>
</head>

<body>
    <div class="container-fluid">
        <?php 
            include 'viewNavbar.php';
        ?>
        <div class="row">
            <div class="col p-3">
                <h1 class="text-center">Cadastro de Carros</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="../controller/CarroController.php" method="post">
                    <div class="mb-3">
                        <label for="placa" class="form-label">Placa</label>
                        <input type="text" name="placa" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" name="modelo" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="cor" class="form-label">Cor</label>
                        <input type="text" name="cor" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="ano" class="form-label">Ano</label>
                        <input type="number" name="ano" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="number" name="valor" class="form-control">
                    </div>
                    <input type="submit" name="cadastrar" value="Salvar" class="btn btn-primary">
                </form>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
            <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Placa</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Cor</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Valor</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $carroDao = new CarroDao();
                      foreach ($carroDao->read() as $carro) :?>
                        <tr>
                        <td><?= $carro->getPlaca() ?></td>
                        <td><?= $carro->getModelo() ?></td>
                        <td><?= $carro->getCor() ?></td>
                        <td><?= $carro->getAno() ?></td>
                        <td><?= $carro->getValor() ?></td>
                        <td>
                        <a href="../controller/CarroController.php?del=<?= $carro->getPlaca() ?>">
                                <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                        </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                  </table>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>