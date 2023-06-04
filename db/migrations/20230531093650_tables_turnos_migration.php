<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TablesTurnosMigration extends AbstractMigration
{
    public function change(): void
    {
        $especialidadTable = $this->table('especialidad');
        $especialidadTable 
        ->addColumn('name', 'string', ['limit' => 30])
        ->addColumn('description', 'string', ['limit' => 200])
        ->create();
        $especialidadTable->renameColumn('id', 'id_especialidad')-> update();

        $profesionalTable = $this->table('profesional');
        $profesionalTable
        ->addColumn('id_especialidad', 'integer', ['signed' => false])
        ->addColumn('name', 'string', ['limit' => 30])
        ->addColumn('lastname', 'string', ['limit' => 30])
        ->addColumn('hora_inicio', 'time')
        ->addColumn('hora_fin', 'time')
        ->addColumn('duracion_turno', 'integer')
        ->addColumn('description', 'string', ['limit' => 200])
        ->addForeignKey('id_especialidad', 'especialidad', 'id_especialidad')
        ->create();
        $profesionalTable->renameColumn('id', 'matricula') -> update();

        $pacienteTable = $this->table('paciente');
        $pacienteTable 
        ->addColumn('dni', 'string', ['limit' => 8])
        ->addColumn('name', 'string', ['limit' => 30])
        ->addColumn('lastname', 'string', ['limit' => 30])
        ->addColumn('email', 'string', ['limit' => 30])
        ->addColumn('password', 'string')
        ->addColumn('gender', 'string', ['limit' => 1])
        ->addColumn('birthdate', 'date')
        ->addColumn('phone', 'string', ['limit' => 30])
        ->create();

        $pacienteTable->renameColumn('id', 'id_paciente')-> update();

        $obraSocialTable = $this->table('obra_social');
        $obraSocialTable
        ->addColumn("name", "string")
        ->addColumn("img", "string")
        ->create();

        $obraSocialTable->renameColumn('id', 'id_obra_social')->update();

        $turnoTable = $this->table('turno');
        $turnoTable 
        ->addColumn('dni', 'string', ['limit' => 8])
        ->addColumn('name', 'string', ['limit' => 30])
        ->addColumn('lastname', 'string', ['limit' => 30])
        ->addColumn('genero', 'string', ['limit' => 1])
        ->addColumn('nacimiento', 'date')
        ->addColumn('edad', 'integer')
        ->addColumn('email', 'string', ['limit' => 30])
        ->addColumn('telefono', 'string', ['limit' => 30])
        ->addColumn('id_especialidad', 'integer', ['signed' => false])
        ->addColumn('matricula', 'integer', ['signed' => false])
        ->addColumn('id_obra_social', 'integer', ['signed' => false])
        ->addColumn('fecha_turno', 'date')
        ->addColumn('hora_turno', 'time')
        ->addColumn('pendiente', 'boolean', ['default' => true])
        ->create();

        $turnoTable->renameColumn('id', 'id_turno') -> update();
    }
}
