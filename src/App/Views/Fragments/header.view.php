<h1><img src="/assets/images/Imagotipo.svg" alt="" /></h1>
<section>
    <a href="iniciar-sesion.html" class="profile"> </a>
	<label for="menu" class="menu"></label>
</section>
<input class="menu-input" type="checkbox" name="menu" id="menu" />
<nav class="header-nav">
	<ul>
        <?php foreach($this -> menu as $item): ?>  
            <?php if(!strcasecmp($item["name"] , $title) ): ?>  
                <li class="current">
		            <a href=<?= $item["href"] ?>><?= $item["name"] ?></a>
                </li>
            <?php else : ?>  
                <li>
		            <a href=<?= $item["href"] ?>><?= $item["name"] ?></a>
		        </li>
            <?php endif;?>  
        <?php endforeach; ?>  
	</ul>
</nav>