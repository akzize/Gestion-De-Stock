<?php
require "./config.php";
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
</head>
<body>
    <section class="home-section">
        <section style="margin: auto;" class="container" >
            <header>nouveau produits</header>
            <form methode="POST" action="article" class="form">
                <?php if (!empty($message_success)): ?>
                    <div class="alert alert-success">
                     <?=$message_success?>
                    </div>
                <?php endif ?>
                <?php if(isset($message)) : ?>
                    <div class="alert alert-danger">
                        <?=$message?>
                    </div>
                <?php endif ?>
                <div class="input-box">
                    <label >Nom produits</label>
                    <input type="text" name="nom" placeholder="Nom produit" />
                </div>
                <div class="input-box">
                    <label >Image produits</label>
                    <input type="file" name="image" placeholder="Image produit" />
                </div>
                <label >Categories</label>
                <div class="column">
                    <div class="select-box">
                        <select name="cat" >
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                </div>
                <div class="input-box">
                    <label for="">Quantite</label>
                    <input type="number" name="Qte" placeholder="Quantite" />
                </div>
                <div class="column">
                    <div class="input-box">
                        <label for="">Prix unitaire</label>
                        <input type="number" name="prix" placeholder="prix" />
                    </div>
                </div>
                <div class="input-box">
                    <label for="">Date expiration</label>
                    <input type="date" name="date-exp" placeholder="Date expiration" />
                </div>
                <div class="input-box">
                    <label for="">Date fabirication</label>
                    <input type="date" name="date-fab" placeholder="Date fabrication" />
                </div>
                <button name="okay" type="submit">Enregistrer</button>
            </form>
        </section>
    </section>
</body>
</html>