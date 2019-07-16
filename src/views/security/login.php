<?php include_once "../src/views/layout/header.php" ?>

<div class="container">
    <div class="row">
        <div class="col-12">

       

            <form name="security" method="post" action="account.php">
            <label for="id"> Entrez votre identifiant : </label>
             <input type="text" name="id" id="id"/> <br/>
            
            <label for="password">Entrez votre Mot de passe : </label>
            <input type="text" name="password" id="password"/><br/>

            <input type="submit" name="valider" value="OK"/>
    </form>
            </div>

        </div>
    </div>
</div>

<?php include_once "../src/views/layout/footer.php" ?>