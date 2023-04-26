<?php if($title === "Noticias"): ?>
    <?php foreach($noticias as $index => $noticia): ?>
        <article class="<?php echo ($index == 0 ? "new head" : "new")?>"> 
            <img src="<?= $noticia -> getImg() ?>" alt="<?= $noticia -> getImgAlt() ?>" width="300" height="200" />
            <h3><?= $noticia -> getTitle() ?></h3>
            <p>
                <?= $noticia -> getDescription() ?>
            </p>
        </article>       
    <?php endforeach;?>
<?php endif;?>

