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
        'action' => 'Registro de entrada de una visita'
        ]);
        Action::create([
        'action' => 'Registro de salida de una visita'
        ]);
        Action::create([
        'action' => 'Modificacion a su perfil'
        ]);
        Action::create([
        'action' => 'Visualizo los reportes de visita'
        ]);
        Action::create([
        'action' => 'Descargo los reportes de visita'
        ]);
    }
}
