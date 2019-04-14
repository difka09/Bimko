<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin super',
            'email' => 'admin@bimko.test',
            'password' => bcrypt('12345678'),
            'identity' => null,
            'agency' => null,
            'grade' => null,
            'phone' => '082136336432',
            'file' => 'admin.jpeg',
            'school_id' => null
        ]);
        $admin->assignRole('admin');
    }
}
