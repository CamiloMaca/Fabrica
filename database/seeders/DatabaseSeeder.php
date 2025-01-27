<?php

namespace Database\Seeders;

use App\Models\TipoTransaccion;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            TipoTransaccionSeeder::class
        ]);
        
        User::factory()->create([
            'name' => 'Test User1',
            'email' => 'test1@example.com',
            'password' => '123456'
        ]);
    }
}
