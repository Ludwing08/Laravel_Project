<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $userAdmin = User::create([
            'name' => "admin",
            'email' => "admin@mail.com",
            'password' => Hash::make('admin')
        ]);

        $userAdmin->assignRole('admin');

        $userEdit = User::create([
            'name' => "editor",
            'email' => "editor@mail.com",
            'password' => Hash::make('editor')
        ]);

        $userEdit->assignRole('editor');
    }
}
