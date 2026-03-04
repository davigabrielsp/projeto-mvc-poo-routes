<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD MVC</title>
  </head>
  <body class="bg-light">
    
  <nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand mb-0 h1">CRUD usuarios</span>
        <a href="/create" class="btn btn-success">Novo</a>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            Lista de usuários
        </div>
    </div>
    <div class="card-body">
        <?php if(empty($usuarios)): ?>
            <div class="alert alert-info">Nenhum usuário encontrado</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($usuarios as $user):?>
                            <tr>
                                <td><?= $user['id']?></td>
                                <td>
                                    <img src="/uploads/<?=  $user['imagem'] ?>" width="60" height="60" class="rounded-circle">
                                </td>
                                <td><?=  $user['nome'] ?></td>
                                <td><?=  $user['email'] ?></td>
                                <td class="text-center">
                                    <a href="/edit/<?=  $user['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="/delete/?id=<?=  $user['id'] ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja remover?')">Remover</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        <?php endif;?>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>