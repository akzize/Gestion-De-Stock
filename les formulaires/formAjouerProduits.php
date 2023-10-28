<?php
if (isset($_POST['okay'])) {
    $nom_article = htmlspecialchars($_POST['nom']);
    $categorie = htmlspecialchars($_POST['cat']);
    $qte = htmlspecialchars($_POST['qte']);
    $prix = $_POST['prix'];
    $date_exp = htmlspecialchars($_POST['date_exp']);
    $date_fab = htmlspecialchars($_POST['date_fab']);
    
    if (!empty($nom_article) && !empty($categorie) && !empty($qte) && !empty($prix) && !empty($date_exp) && !empty($date_fab)) {
        if (isset($_FILES['image']) && !empty($_FILES['image'])) {
            $extenstion_valide = array("jpeg", "png", "jpg");
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
    
            $extenstion = pathinfo($file_name, PATHINFO_EXTENSION);
            if (in_array($extenstion, $extenstion_valide)) {
                $image_path = "../IMAGE/" . $file_name;
                if (!move_uploaded_file($file_tmp, $image_path)) {
                    $message = "L'image n'a pas été déplacée";
                }
            } else {
                $message = "Veuillez choisir une extension valide";
            }
        }
        if (empty($message)) {
            $table = 'article';
            $columns = 'nom_article,image,categorie,quantite,prix_unitaire,date_expiration,date_fabrication';
            $values = [$nom_article, $file_name, $categorie, $qte, $prix, $date_exp, $date_fab];
            insertIntoDatabase($table, $columns, $values);
            $message_success = "L'article a bien été ajouté";
        }
    } else {
        $message = 'Veuillez remplir tous les champs';
    }
}
?>
 

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>nouveau produits</title>
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