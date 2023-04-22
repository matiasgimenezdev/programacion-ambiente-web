<h1><img src="/assets/images/Imagotipo.svg" alt="UL Hospitals logo" /></h1>
<section>
    <a href="/login" class="profile"></a>
	<label for="menu" class="menu"></label>
</section>
<input class="menu-input" type="checkbox" name="menu" id="menu" />
<nav class="header-nav">
	<ul>
        <?php foreach($this -> headerMenu as $item): ?>  
            <?php if(strcasecmp($item["name"] , $title) === 0): ?>  
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