<?php if($title === "Noticias"): ?>
    <?php foreach($noticias as $index => $noticia): ?>
        <article class="<?php echo ($index == 0 ? "new head" : "new")?>"> 
            <a href="<?= "/noticia?id=". $noticia -> getId() ?>">
                <img src="<?= $noticia -> getImg() ?>" alt="<?= $noticia -> getImgAlt() ?>" width="300" height="200" />
            </a>
            <a href="<?= "/noticia?id=" . $noticia -> getId() ?>"> 
                <h3><?= $noticia -> getTitle() ?></h3>
            </a>
            <p>
                <?= $noticia -> getDescription() ?>
            </p>
        </article>
    <?php endforeach;?>
<?php endif;?>

