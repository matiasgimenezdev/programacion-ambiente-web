<?php if (sizeof($turnos) > 0): ?>
  <?php foreach ($turnos as $turno): ?>
    <details>
      <summary>Turno
        <?= $turno->getId() ?>
      </summary>
      <h4>Información del turno</h4>
      <ul>
        <li>Médico:
          <?= $turno->getProfesional() ?>
        </li>
        <li>Especialidad:
          <?= $turno->getEspecialidad() ?>
        </li>
        <li>Fecha:
          <?= $turno->getFecha() ?>
        </li>
        <li>Hora:
          <?= $turno->getHora() ?>
        </li>
      </ul>
      <button class="cancelar-turno">Cancelar turno</button>
    </details>
  <?php endforeach; ?>
<?php else: ?>
  <h4> No tienes turnos programados </h4>
<?php endif; ?>