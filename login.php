<?php 
    session_start();
    require 'partials/functions.php';
    require 'partials/db.php';
?>

<?php
    if(isset($_POST['connexion'])){
        $errors = array();
        // $err_datas = array();
        if(empty($_POST['username'])){
           $errors['username'] = "Veuillez saisir votre pseudo";
        }else if(!filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)){
           $errors['username'] = "Cet email n'est pas valide";
        }
        if(empty($_POST['password'])){
            $errors['password'] = "Veuillez saisir votre mot de passe";
        }
        if(empty($errors)){
            // $err_datas = array();
            $req = $pdo->prepare("SELECT * FROM users WHERE username= ? AND pwd= ? ");
            $req->execute([$_POST["username"], $_POST["password"]]);
            $user = $req->fetch();
            if($user){
                $_SESSION['auth'] = $user;
                $_SESSION['auth']['id'] = $user['id'];
                $_SESSION['auth']['username'] = $user['username'];
                header('Location: account.php');
                exit;
            }else{

                $errors["data"] = "Le pseudo ou le mot de passe ne correspond pas !";
            }

        }
    }
?>

<?php require 'partials/header.php';?>

<?php if(!empty($errors)):?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach($errors as $error):?>
                <li><?= $error; ?></li>
            <?php endforeach;?>
        </ul>
    </div>        
    
<?php endif;?>

<?php if(!empty($err_datas)):?>
    <div class="alert alert-success">
        <ul>
            <?php foreach($err_datas as $message):?>
                <li><?= $message; ?></li>
            <?php endforeach;?>
        </ul>
    </div>        
    
<?php endif;?>


<h1 class="text-center">Veuillez vous connecter maintenant</h1>
<form action="" method="post" class="col-lg-6 col-lg-offset-3 border">
    <h4 class="text-left">Se connecter</h4><hr>
    <div class="form-group <?php if(isset($errors['username'])){ echo "has-error";}?>">
        <label for="">Pseudo ou email</label>
        <input type="email"  class="form-control" name="username" 
        value="<?php if(!empty($_POST['username'])){echo $_POST['username'];}?> ">
    </div>

    <div class="form-group <?php if(isset($errors['password'])){echo "has-error";}?>">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" name="password">
    </div>
        <button class="btn btn-primary" type="submit" name="connexion">Se connecter</button>
</form>

<?php require 'partials/footer.php';?>