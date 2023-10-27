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
