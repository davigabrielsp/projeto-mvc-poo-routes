<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Novo Usuário</title>
  </head>
  <body class="bg-light">
    
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                Cadastrar novo usuário
            </div>
            <div class="card-body">
                <form action="/store" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label  class="form-label">Nome</label>
                        <input type="text" name="nome" required id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Email</label>
                        <input type="email" name="email" required id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Imagem</label>
                        <input type="file" name="imagem" required id="" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">SALVAR</button>
                    <a href="/" class="btn btn-secondary">Voltar</a>
                </form>
            </div>
        </div>
    </div>

  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>