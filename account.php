
<?php require 'partials/functions.php';?>
<?php require 'partials/header.php';?>
<?php require "partials/redirect.php";?>


    <!-- <h1 class="jumbotron">Bienvenue</h1> -->
    <div class="container">         
        <div class="row" style="margin-top : 40px;">
            <div class="col-lg-10 col-sm-10 col-sm-offset-1 col-sm-offset-2 col-6 col-lg-offset-1 mt-5 header" id="retire">
                <div class="col-lg-4 anim1">
                    <div class="items">
                        <img src="./img/money.png" alt="">
                        <div class="desc">
                            <a href="withdrawal.php">Retrait direct de nonnaie</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 anim8">
                    <div class="items">
                        <img src="img/savings.png" alt="">
                        <div class="desc">
                            <a href="save.php">Enregistrer la monnaie d'un client</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 anim2">
                    <div class="items">
                        <img src="./img/budget.png" alt="">
                        <div class="desc">
                            <a href="deduction.php">Deduction de la monnaie à la suite d'un achat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--------------------------------- LES DIFFRENTES OPERATIONS  ------------------------------------------->


        <!-- Retrait direct -->
        <div class="col-lg-6 col-lg-offset-3 hide" id="direct">
            <form action="" method="post" >
                <div class="form-group">
                    <label for=""></label>
                    <input type="text"  class="form-control" name="num_client" placeholder="Numero client ...">
                </div>
                    <button class="btn btn-info" type="submit" name="connexion">Soumettre</button>
            </form>
        </div>

        <!-- Enregistrement -->
        <div class="col-lg-6 col-lg-offset-3 hide" id="save">
            <form action="" method="post" >             
                <p class="lead">Enregistrement</p>
                <div class="form-group">                
                    <input type="text"  class="form-control" name="num_client" placeholder="Numero carte ... ou Numéro tel">
                </div>
                <div class="form-group">                
                    <input type="number" name="montant" class="form-control" placeholder="Montant">
                </div>
                    <button class="btn btn-info" type="submit" name="connexion">Soumettre</button>
            </form>            
        </div>
    </div>
<?php require 'partials/footer.php';?>