<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * to make a demo admin user
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Admin;
        $admin->image = "/test";
        $admin->name = "Super User";
        $admin->email = "admin@mailinator.com";
        $admin->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
        $admin->status= 1;
        $admin->save();
    }
}
