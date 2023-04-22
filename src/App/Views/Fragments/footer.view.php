<address>
	<p>Ruta 5 y Avenida Constitución, Luján, Buenos Aires</p>
	<p>+54 (2323) 221133 - Atención telefónica las 24hs</p>
</address>
<nav>
	<ul>
		<?php foreach($this -> footerMenu as $item): ?>  
            <li>
		        <a href=<?= $item["href"] ?>><?= $item["content"] ?></a>
		    </li>
        <?php endforeach; ?> 
	</ul>
</nav>
<p>
	&copy;2023 Clinica Universitaria.
	<small>Todos los derechos reservados.</small>
</p>