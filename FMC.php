<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Categorie</title>
    <link rel="stylesheet" href="SAC.css">
   
</head>
<body>
    <?php
        if(isset($_POST['ajouter'])){
            $libelle =$_POST['libelle'];
            $description =$_POST['Description'];

            if(!empty($libelle)&& !empty($description)){
                ?>
                <div class='alert alert-success' role='alert'>
                    La categorie est bien ajouter  
                <?php
            }else{
                ?>
                <div class='alert alert-danger' role='alert'>
                    Liballe , description sont obligatoires
                </div>
                <?php
            }
        }
    ?>
    <div class="container">
        <h4 style="text-align: center;">Modifier categorie</h4>
        <form method="post">
            <div>
                <label class="label">Libelle</label>
                <input type="text" class="form-controle" name="libelle">
            </div>
            <div>
                <label class="label">Description</label>
                <input type="text" class="form-controle" name="Description">
            </div>
            <button name="ajouter" type="submit" value="Ajouter Categorie">Modifier Categorie</button>
            <!-- <input type="submit" class="green-button"  name="ajouter"> -->
        </form>
    </div>
</body>
</html>
