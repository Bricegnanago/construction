<?php require 'partials/functions.php';?>
<?php require 'partials/header.php';?>
<?php include "partials/redirect.php";?>


<?php 
    if(isset($_POST['withdrawal'])){        
        $errors = array();
        require "partials/db.php";        
        if(empty($_POST['input-partial-withdrawal'])){
            $req = $pdo->prepare('UPDATE customer SET amount= 0 WHERE id= ?');
            $req->execute([$_SESSION['customers']['id']]);         
            $_SESSION['flash']["success"] = "Retrait global au " . $_SESSION['customers']['numbers'];
            $_SESSION['customers']['amount'] = 0;
            header('Location: account.php');
            exit;
        }else{
            //Recupérer la valeur de cette entré puis la retourner
            $new_Amount = $_SESSION['customers']['amount'] - $_POST['input-partial-withdrawal'];
            $req = $pdo->prepare('UPDATE customer SET amount= ? WHERE id= ?');
            $req->execute([$new_Amount, $_SESSION['customers']['id']]);
            $_SESSION['flash']["success"] = "Retrait partiel de " . $_POST['input-partial-withdrawal'] ." FCFA au " . $_SESSION['customers']['numbers'];
            $_SESSION['customers']['amount'] = $new_Amount;
            header('Location: account.php');
            exit;
        }
    }
?>

<div class="page">        
    <div class="col-lg-4 col-lg-offset-4">        
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title text-center h1">Autorisation de Retrait</h1>
            </div>
            <div class="panel-body">
                <ul class="list-group">                    
                    <li class="list-group-item well">
                        <span class="badge badge-primary"><?= $_SESSION['customers']['numbers'];?></span>
                        N° Identification
                    </li>
                    <li class="list-group-item well">
                        <span class="badge"><?= $_SESSION['customers']['amount'];?></span>
                        Montant dû
                    </li>
                </ul>
            </div>                
                    
            <form action="" method="post">
                <div class="form-group hide" style=" width: 100%" id="entre0">
                    <input type="number" min="25" max="<?= $_SESSION['customers']['amount'];?>" step="25"  
                    placeholder="Retrait partiel" id="input-partial-withdrawal" 
                    class="form-control partial-withdrawal" 
                    style="width: 50%" name="input-partial-withdrawal">
                </div>
                <div class="form-group" id="entre">
                    <center><input type="button" class="btn btn-info" value="Effectuer un retrait partiel" name="partial-withdrawal" <?php if($_SESSION['customers']['amount'] == 0){ echo "disabled"; }?>></center>
                </div>            
                <div class="panel-footer">
                    <center><button type="submit" class="btn btn-info btn-withdrawal" name="withdrawal" <?php if($_SESSION['customers']['amount'] == 0){ echo "disabled"; }?>>Retirer</button></center>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require 'partials/footer.php';?>