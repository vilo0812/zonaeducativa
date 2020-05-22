<?php
use App\Action;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Action::create([
        'action' => 'Registro de Entrada de una Visita'
        ]);
        Action::create([
        'action' => 'Registro de Salida de una Visita'
        ]);
        Action::create([
        'action' => 'Modificacion a su Perfil'
        ]);
        Action::create([
        'action' => 'Visualizo los Reportes de Visita'
        ]);
        Action::create([
        'action' => 'Descarga de Reportes de Visita'
        ]);
    }
}
