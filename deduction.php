<?php require "partials/header.php";?>
<?php require "partials/functions.php";?>
<?php include "partials/redirect.php";?>
<?php require "partials/db.php";?>

        <!-- traitement des données -->
        <?php        
            if(isset($_POST['valider'])){
                $errors = array();
                $form = array();                
                if(empty($_POST['numbers'])){
                   $errors['numbers'] = "Veuillez saisir le numnéro";
                }else{
                    //le chercher dans la base de donnée                    
                    $sql = "SELECT * FROM customer WHERE numbers = " . $_POST['numbers'];
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $customer = $stmt->fetch();
                    if(empty($customer)){
                        $errors['numbers'] = "Ce numéro n'est pas enregistré dans notre base de donnée";
                    }
                }
                if(empty($_POST['amount']) || $_POST['amount'] <= 0 ){
                    $errors['amount'] = "Vous devez saisir un montant valide pour la deduction !";
                }
                
                if(empty($errors)){                    
                    // $new_Amount = $_POST['amount'] + $customer['amount'];
                    // $req = $pdo->prepare("UPDATE customer SET amount = ? WHERE numbers= ?");
                    // $req->execute([$new_Amount, $_POST['num']]);
                    // $_SESSION['flash']['success'] = "Votre monnaie à bien été enregistré";                        
                    // header('Location: ' . $_SERVER['PHP_SELF']);
                    // exit;
                    // $_SESSION["flash"]['success'] = "Identification client réussi ! ";
                    $_SESSION["customers"] = $customer;
                    $_SESSION["customers"]['mtn'] = $_POST['amount'];
                    // calcul du montant à payer
                    
                    $_SESSION["customers"]['new_Amount'] = $new_Amount = 0;
                    if($_SESSION["customers"]['amount'] <= $_POST['amount']){
                        $_SESSION["customers"]['newMtn'] = $_POST['amount'] - $_SESSION["customers"]['amount'];
                    $req = $pdo->prepare("UPDATE customer SET amount = ? WHERE numbers= ?");
                    $_SESSION["customers"]['mtn'] = $_POST['amount'];

                    $req->execute([$new_Amount, $_POST['numbers']]);
                    header('Location: deduction-validation.php');
                    exit;                    
                    }else if($_SESSION["customers"]['amount'] > $_POST['amount']){
                        $new_Amount = $_SESSION["customers"]['amount'] - $_SESSION["customers"]['mtn'];
                        $_SESSION["customers"]['newMtn'] = 0;
                        $_SESSION["customers"]['new_Amount'] = $new_Amount; //nouveau solde
                        $req = $pdo->prepare("UPDATE customer SET amount = ? WHERE numbers= ?");
                        $req->execute([$new_Amount, $_POST['numbers']]);
                        header('Location: deduction-validation.php');
                        exit;                    
                    }else{
                        $_SESSION["flash"]['warnning'] = "Opération Impossible : solde null au " . $_SESSION["customers"]['numbers'];
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
        

        <form class="form-horizontal well" action="" method="post">
            <fieldset>
                <legend>Deduction après achat</legend>      
                <div class="form-group">
                    <label for="numbers" class="col-lg-2 control-label">Numéro</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="numbers" placeholder="Numéro" name="numbers" >
                    </div>
                </div>
                <div class="form-group ">
                    <label for="amount" class="col-lg-2 control-label">Montant</label>
                    <div class="col-lg-10">
                        <input type="number" class="form-control" id="amount" placeholder="Montant facture" name="amount" value="0" min="0" max="5000" step="50">
                    </div>
                </div>                                                                         
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="valider">Soumettre</button>
                    </div>
                </div>                
            </fieldset>
        </form>
    </div>
</div>