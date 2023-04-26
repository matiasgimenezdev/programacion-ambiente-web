<?php if (sizeof($obrasSociales) > 0): ?>
  <?php foreach ($obrasSociales as $obraSocial): ?>
    <article>
      <figure>
        <img src="<?= $obraSocial->getImg() ?>" alt="Swiss Medical logo" width="200" height="200" />
        <figcaption>
          <?= $obraSocial->getName() ?>
        </figcaption>
      </figure>
    </article>
  <?php endforeach; ?>
<?php endif; ?>