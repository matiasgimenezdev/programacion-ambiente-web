<?php if(sizeof($especialidades) > 0):?>
    <?php foreach($especialidades as $especialidad): ?>
        <article class="search-result">
            <h4 class="specialty-name"> <?= $especialidad -> getName() ?> </h4>
            <p class="specialty-description">
                <?= $especialidad -> getDescription() ?>
            </p>
            <a href=" <?= "/profesional/search?profesional=". $especialidad -> getName()?>"><button>Ver profesionales</button></a>
        </article>
    <?php endforeach; ?>
<?php else: ?>
    <h4 class="specialty-name"> No se encontraron especialidades que coincidan con la busqueda</h4>
<?php endif; ?>
