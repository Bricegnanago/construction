
<?php require "partials/header.php";?>
<?php require "partials/functions.php";?>
<?php include "partials/redirect.php";?>
        <!-- traitement des données -->
        <?php        
            if(isset($_POST['ok'])){
                $errors = array();
                $form = array();                
                if(empty($_POST['num'])){
                   $errors['num'] = "Veuillez saisir le numnéro";
                }
                if(empty($_POST['amount'])){
                    $errors['amount'] = "Veuillez la valeur de la monnaie à enregistrer";
                }                
                if(empty($errors)){                                        
                    require "partials/db.php";                    
                    $sql = "SELECT * FROM customer WHERE numbers = " . $_POST['num'];
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $customer = $stmt->fetch();
                    

                    // Dans la cas où l'utilisateur n'existe pas encore de la bd
                    if(!empty($customer)){
                        // $_SESSION['flash']['customer'] = $customer["amount"];
                        $new_Amount = $_POST['amount'] + $customer['amount'];
                        $req = $pdo->prepare("UPDATE customer SET amount = ? WHERE numbers= ?");
                        $req->execute([$new_Amount, $_POST['num']]);
                        $_SESSION['flash']['success'] = "Votre monnaie à bien été enregistré";                        
                        header('Location: ' . $_SERVER['PHP_SELF']);
                        exit;
                    }                                        
                    else{
                        $req = $pdo->prepare("INSERT INTO customer(numbers, amount, saved_By) VALUES (?, ?, ?)");
                        $req->execute([$_POST['num'], $_POST['amount'], $_SESSION['auth']['id']]);
                        $_SESSION['flash']['success'] = "Compte Initialisé et mis à jours";
                        header('Location: ' . $_SERVER['PHP_SELF']);
                        exit;
                    }
                    
                }
            }            
        ?>
    <div class="retrait">
        <div class="col-lg-6 col-lg-offset-3">        
        <?php if(!empty($errors)):?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach($errors as $error):?>
                        <li><?= $error; ?></li>
                    <?php endforeach;?>
                </ul>
            </div>            
        <?php endif;?>    
        <?php if(isset($_SESSION['flash']) && !empty($_SESSION['flash'])):?>
        <?php foreach($_SESSION['flash'] as $type => $message):?>
          <div class="alert alert-dismissible alert-<?= $type; ?>" data-dismiss="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= $message ; ?>
          </div>                   
        <?php endforeach; ?>      
        <?php unset($_SESSION['flash']) ;?>
      <?php endif; ?>
        <form action="" method="POST" class="well">
            <div class="lead">
                <h6>Enregistrer la monnaie pour un client</h6>
            </div>
            <div class="form-group mb-5">
                <input type="text" placeholder="Numéro" class="form-control color" name="num">
            </div>
            <div class="form-group mb-5">                    
                <input type="number" value="0" min="0" max="5000" step="50" class="form-control color" name="amount">
            </div>
            <button class="btn btn-info btn-lg" type="submit" name="ok">OK</button>
        </form>
        </div>
    </div>    