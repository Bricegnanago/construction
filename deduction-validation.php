<?php require "partials/header.php";?>
<?php require "partials/functions.php";?>
<?php include "partials/redirect.php";?>
<?php require "partials/db.php";?>

        <!-- traitement des données -->
        <?php        
            $sql = "SELECT * FROM customer WHERE amount = " . $_SESSION['customers']['numbers'];
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $customer = $stmt->fetch();
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
                <?php unset($errors);?>
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
        
    
        <form class="form-horizontal" action="" method="post">
            <fieldset>
                <legend>Bilan de l'opération</legend>               
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Prise en compte de la monnaie</div>
                                <div class="panel-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge"><?= $_SESSION["customers"]['numbers']?></span>
                                        Numéro :
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge"><?= $_SESSION["customers"]['new_Amount'];?></span>
                                        Nouveau Solde : 
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge"><?= $_SESSION['customers']['mtn'];?></span>
                                        Montant achat : 
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge"><?= $_SESSION["customers"]['newMtn'] ;?></span>
                                        Montant à payer : 
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>    
                    </div>                                            
                <div class="form-group">
                    <div class="col-12">
                        <a class="btn btn-primary col-xs-10 col-xs-offset-1 btn-lg" href="account.php">Terminer</a>
                    </div>
                </div>                
            </fieldset>
        </form>
    </div>
</div>    