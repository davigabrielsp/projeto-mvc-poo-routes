<?php

namespace App\Controllers;

use App\Models\Usuario;
use Config\Database;

class UsuarioController
{

    private Usuario $model;

    public function __construct()
    {
        $database = new Database();
        $this->model = new Usuario($database->getConnection());
    }

    public function index(){
        $usuarios = $this->model->all();
        require __DIR__.'/../../views/usuarios/index.php';
    }

    public function create(){
        require __DIR__ . '/../../views/usuarios/create.php';
    }

    public function edit($id){
        $usuario = $this->model->find($id);
        if(!$usuario){
            die('usuario não encontrado');
        }
        require __DIR__ . '/../../views/usuarios/edit.php';
    }
    public function store(){
        $this->model->setNome($_POST['nome']);
        $this->model->setEmail($_POST['email']);

        if(!empty($imagem = $_FILES['imagem']['name'])):
        move_uploaded_file(
            $_FILES['imagem']['tmp_name'],
            __DIR__.'/../../public/uploads/'. $imagem
        );

        $this->model->setImagem($imagem);
        endif; 
        $this->model->create();

        header("Location: /");
        exit();
    }

    public function update()
{
    $id = $_POST['id'];

    $this->model->setNome($_POST['nome']);
    $this->model->setEmail($_POST['email']);

    if (!empty($_FILES['imagem']['name'])) {
        $imagem = $_FILES['imagem']['name'];

        move_uploaded_file(
            $_FILES['imagem']['tmp_name'],
            __DIR__ . '/../../public/uploads/' . $imagem
        );

        $this->model->setImagem($imagem);
    }

    $this->model->update($id);

    header("Location: /");
    exit();
}

    public function delete($id){
        $this->model->delete($id);
        header("Location: /");
        exit();
    }

}