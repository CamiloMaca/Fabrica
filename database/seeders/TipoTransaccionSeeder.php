<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoTransaccion;

class TipoTransaccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoTransaccion::create(['TipoTransaccion' => 'Ingreso']);
        TipoTransaccion::create(['TipoTransaccion' => 'Egreso']);
    }
}
