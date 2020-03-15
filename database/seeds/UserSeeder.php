<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        Role::create(['name' => 'producer']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'operator']);

        $data = [];

        array_push($data, [
            'name'     => 'Joãozinho Produtor',
            'email'    => 'produtor@teste.com',
            'password' => bcrypt('123456'),
        ]);

        array_push($data, [
            'name'     => 'Joãozinho Gestor',
            'email'    => 'gestor@teste.com',
            'password' => bcrypt('123456'),
        ]);

        array_push($data, [
            'name'     => 'Joãozinho Operador',
            'email'    => 'operador@teste.com',
            'password' => bcrypt('123456'),
        ]);

        User::insert($data);

        User::where('email', '=', 'produtor@teste.com')->first()->assignRole('producer');
        User::where('email', '=', 'gestor@teste.com')->first()->assignRole('manager');
        User::where('email', '=', 'operador@teste.com')->first()->assignRole('operator');

    }
}
