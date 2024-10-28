<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Administrator',
                'email' => 'admin@mail.com',
                'password' => Hash::make('semangat'),
                'user_level'    => '0',
                'created_at'   => date('Y-m-d'),
                'updated_at'   => date('Y-m-d'),
            ],
        ];
        DB::table('users')->insert($users);
        $employee = [
            [
                'id_employee'       => 1,
                'id_users'          => 1,
                'user_phone'        => '0812345678',
                'user_job_status'   => 'Admin',
                'created_at'        => date('Y-m-d'),
                'updated_at'        => date('Y-m-d'),
            ],
        ];
        DB::table('employee')->insert($employee);
    }
}
