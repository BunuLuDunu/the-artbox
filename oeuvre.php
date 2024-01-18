<?php
    require_once(__DIR__ . '/oeuvres.php');

    if (
        // Verification de la présence de l'id dans l'URL
        !isset($_GET['id'])
        // Vérification que l'id a bien une valeur
        || empty($_GET['id'])
    ) {
        echo('Veuillez renseigner un id pour accéder à cette page');
        return;
    }

    $oeuvre = [];

    // Parcours du tableau pour retouver l'oeuvre correspondante à l'id présente dans l'URL
    foreach($oeuvres as $item) {
        if($item['id'] == $_GET['id']) {
            $oeuvre = $item;
            break;
        }
    }

    // var_dump($oeuvre);

    if(
        // La variable oeuvre contient-elle des informations
        empty($oeuvre)
    ) {
        echo('Cet id ne correspond à aucune oeuvre');
        return;
    }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>The ArtBox</title>
</head>
<body>

<?php require_once(__DIR__ . '/header.php'); ?>

<main>
    <article id="detail-oeuvre">
        <div id="img-oeuvre">
            <img src="<?php echo $oeuvre['image']['src'];?>" alt="<?php echo $oeuvre['image']['alt']; ?>">
        </div>
        <div id="contenu-oeuvre">
            <h1><?php echo $oeuvre['title']; ?></h1>
            <p class="description"><?php echo $oeuvre['artist']; ?></p>
            <p class="description-complete"><?php echo $oeuvre['description']; ?>
            </p>
        </div>
    </article>
</main>

<?php require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>
