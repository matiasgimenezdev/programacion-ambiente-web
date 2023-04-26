<!DOCTYPE html>
<html lang="es">
<head>
	<?php require __DIR__ . "/../Fragments/head.view.php" ?>
</head>

<body>
	<header>
		<?php require __DIR__ . "/../Fragments/header.view.php" ?>
	</header>

	<main>
        <article>
            <h2 class="title"> <?= $noticia -> getTitle() ?></h2>
            <figure>
                <img src="<?= $noticia -> getImg() ?>" alt=" <?= $noticia -> getImgAlt()?>"/>
                <figcaption><?= $noticia -> getDescription() ?></figcaption>
            </figure>
            <p>
                <?= $noticia -> getBody() ?>
            </p>
        </article>

	</main>
	<footer>
		<?php require __DIR__ . "/../Fragments/footer.view.php" ?>
	</footer>
</body>

</html>