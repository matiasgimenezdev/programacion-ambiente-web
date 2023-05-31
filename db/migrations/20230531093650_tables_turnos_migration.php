<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TablesTurnosMigration extends AbstractMigration
{
    public function change(): void
    {
        $especialidadTable = $this->table('especialidad');
        $especialidadTable ->addColumn('name', 'string', ['limit' => 30])
        ->addColumn('description', 'string', ['limit' => 200])
        ->create();
        $especialidadTable->renameColumn('id', 'id_especialidad')-> update();

        $profesionalTable = $this->table('profesional');
        $profesionalTable ->addColumn('matricula', 'integer')
        ->addColumn('id_especialidad', 'integer', ['signed' => false])
        ->addColumn('name', 'string', ['limit' => 30])
        ->addColumn('lastname', 'string', ['limit' => 30])
        ->addColumn('hora_inicio', 'time')
        ->addColumn('hora_fin', 'time')
        ->addColumn('duracion_turno', 'integer')
        ->addColumn('description', 'string', ['limit' => 200])
        ->addForeignKey('id_especialidad', 'especialidad', 'id_especialidad')
        ->create();
        $profesionalTable->removeColumn('id')-> addIndex('matricula') -> update();

        $pacienteTable = $this->table('paciente');
        $pacienteTable ->addColumn('dni', 'string', ['limit' => 8])
        ->addColumn('name', 'string', ['limit' => 30])
        ->addColumn('lastname', 'string', ['limit' => 30])
        ->addColumn('email', 'string', ['limit' => 30])
        ->addColumn('password', 'string', ['limit' => 30])
        ->addColumn('gender', 'string', ['limit' => 1])
        ->addColumn('birthdate', 'datetime')
        ->addColumn('phone', 'string', ['limit' => 30])
        ->create();

        $pacienteTable->renameColumn('id', 'id_paciente')-> update();


        $turnoTable = $this->table('turno');
        $turnoTable ->addColumn('id_paciente', 'integer', ['signed' => false])
        ->addColumn('matricula', 'integer')
        ->addColumn('fecha_turno', 'datetime')
        ->addColumn('hora_turno', 'time')
        ->addColumn('razon_visita', 'string', ['limit' => 200])
        ->addForeignKey('id_paciente', 'paciente', 'id_paciente')
        ->addForeignKey('matricula', 'profesional', 'matricula')
        ->create();

        $turnoTable->renameColumn('id', 'id_turno') -> update();
    }
}
