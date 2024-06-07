<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@erp.com',
            'password' => bcrypt('12345678'),
            'role' => 'Super Admin'
        ]);
        $super_admin->assignRole('Super Admin');
        $sales = User::create([
            'name' => 'Tian',
            'email' => 'tian@erp.com',
            'password' => bcrypt('12345678'),
            'role' => 'Sales'
        ]);
        $sales->assignRole('Sales');

        $pm = User::create([
            'name' => 'Zaky',
            'email' => 'zaky@erp.com',
            'password' => bcrypt('12345678'),
            'role' => 'Project Manager'
        ]);
        $pm->assignRole('Project Manager');

        $warehouse = User::create([
            'name' => 'Safjar',
            'email' => 'ss@erp.com',
            'password' => bcrypt('12345678'),
            'role' => 'Warehouse'
        ]);
        $warehouse->assignRole('Warehouse');
    }
}
