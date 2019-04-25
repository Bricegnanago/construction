<?php require "partials/header.php";?>
<?php require "partials/functions.php";?>
<?php include "partials/redirect.php";?>

    <?php  
        if(isset($_POST["connexion"])){
            $errors = array();            
            if(empty($_POST["numbers"])){
               $errors['numbers'] = "Un muméro valide SVP";
            }else{
                $numbers = test_input($_POST['numbers']);
                require 'partials/db.php';
                $req = $pdo->prepare("SELECT * FROM customer WHERE numbers = ? ");
                $req->execute([$numbers]);
                $customer = $req->fetch();                
                if($customer){
                    $_SESSION['customers'] = $customer;
                    $_SESSION['customers']['amount'] = $customer["amount"];
                    $_SESSION['customers']['firstname'] = $customer["firstname"];
                    $_SESSION['customers']['lastname'] = $customer["lastname"];
                    $_SESSION['customers']['numbers'] = $customer["numbers"];
                    header('Location: validation.php');
                    exit;
                }
                else{
                    $errors['none'] = "Aucun client enregistré correspond à ce numéro";
                }

            }            

            
        }
    ?>
    


    <div class="retrait">
    
    
        <div class="col-lg-6 col-lg-offset-3" style="margin-top: 5rem">
        <?php if(!empty($errors)):?>
        
        <div class="alert alert-danger">        
            <ul>
                <?php foreach($errors as $error):?>
                    <li><?= $error; ?></li>
                <?php endforeach;?>
            </ul>
        </div>

    <?php endif;?>
            <form action="" method="POST" class="">
                <fieldset>
                    <legend><strong> Saisir le numéro du montant à retirer</strong></legend>
                    <div class="form-group">                    
                        <input type="text" placeholder="Numéro" class="form-control" name="numbers">
                    </div>
                    <button class="btn btn-info btn-lg" type="submit" name="connexion">OK</button>
                </fieldset>
            </form>
        </div>
    </div>    
    <?php require "partials/footer.php";