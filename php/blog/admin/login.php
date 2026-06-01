<?php
include './header.php';
include_once "./database/db.class.php";

$db = new db('usuario');
$success = '';
$actionError = '';
$errors = [];
$data = "";

if (!empty($_GET['id'])) {
    $data = $db->find($_GET['id']);
}

if (!empty($_POST)) {

    $data = (object) $_POST;
    // var_dump($_POST);
    //exit;
    try {

        if (empty($_POST['email'])) {
            $errors[] = "<li>O email é obrigatório</li>";
        }
        if (empty($_POST['senha'])) {
            $errors[] = "<li>A senha é obrigatória</li>";

            if(strlen($_POST['senha'] < 3)){
                $errors[] = "<li>A senha deve ter no mínimo 3 caracteres</li>";
            }
        }

        if (empty($errors)) {

        $dado = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone'] ? $_POST['telefone'] : "",
            'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),

        ];

                $db->store($_POST);
                $success = "Registro Salvo com sucesso!";
           

            redirect('./UsuarioList.php');
        }
    } catch (PDOException $e) {
        $actionError = $e->getMessage();
    } catch (Exception $e) {
        $actionError = $e->getMessage();
    }
}

?>

<div class="row">
    <?php actionMessage($success, $actionError) ?>
    <?php showValidationError($errors) ?>

    <form action="UsuarioForm.php" method="post">
        <h3>Registrar Usuário</h3>        
        <div class="col-6">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo getFormValue($data, 'email'); ?>">
        </div>
        <div class="col-6">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" value="<?php echo getFormValue($data, 'senha'); ?>">
        </div>
        <div class="mt-2">
            <button type="submit" class="btn btn-success">Salvar</button>
             Não tem uma conta? <a href="./registrar.php" class="btn btn-primary"> Crie aqui</a>
        </div>


    </form>

</div>

<?php
include './footer.php';
?>