<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TurnosTableMigration extends AbstractMigration
{
    public function change(): void
    {
        $especialidadTable = $this->table('especialidad');
        $especialidadTable->addColumn('id_especialidad', 'integer')
        ->addIndex('id_especialidad')
        ->addColumn('nombre', 'string', ['limit' => 30])
        ->addColumn('descripcion', 'string', ['limit' => 200])
        ->create();

        $profesionalTable = $this->table('profesional');
        $profesionalTable->addColumn('matricula', 'integer')
        ->addIndex('matricula')
        ->addColumn('id_especialidad', 'integer')
        ->addColumn('nombre', 'string', ['limit' => 30])
        ->addColumn('apellido', 'string', ['limit' => 30])
        ->addColumn('hora_inicio', 'time')
        ->addColumn('hora_fin', 'time')
        ->addColumn('duracion_turno', 'integer')
        ->addColumn('descripcion', 'string', ['limit' => 200])
        ->addForeignKey('id_especialidad', 'especialidad', 'id_especialidad')
        ->create();

        $pacienteTable = $this->table('paciente');
        $pacienteTable->addColumn('id_paciente', 'integer')
        ->addIndex('id_paciente')
        ->addColumn('dni', 'string', ['limit' => 8])
        ->addColumn('nombre', 'string', ['limit' => 30])
        ->addColumn('apellido', 'string', ['limit' => 30])
        ->addColumn('email', 'string', ['limit' => 30])
        ->addColumn('password', 'string', ['limit' => 30])
        ->addColumn('genero', 'string', ['limit' => 1])
        ->addColumn('nacimiento', 'datetime')
        ->addColumn('telefono', 'string', ['limit' => 30])
        ->create();

        $turnoTable = $this->table('turno');
        $turnoTable->addColumn('id_turno', 'integer')
        ->addIndex('id_turno')
        ->addColumn('id_paciente', 'integer')
        ->addColumn('matricula', 'integer')
        ->addColumn('fecha_turno', 'datetime')
        ->addColumn('hora_turno', 'time')
        ->addColumn('razon_visita', 'string', ['limit' => 200])
        ->addForeignKey('id_paciente', 'paciente', 'id_paciente')
        ->addForeignKey('matricula', 'profesional', 'matricula')
        ->create();

    }
}
