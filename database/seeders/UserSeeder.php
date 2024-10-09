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
                'name' => 'Sulistiya Nugroho',
                'email' => 'sulis.nugroho@inlingua.co.id',
                'password' => Hash::make('semangat45'),
                'user_level'    => '0',
                'created_at'   => date('Y-m-d'),
                'updated_at'   => date('Y-m-d'),
            ],
            [
                'id' => 2,
                'name' => 'Isnaini Nur Pramesty',
                'email' => 'pramesnain@gmail.com',
                'password' => Hash::make('semangat45'),
                'user_level'    => '1',
                'created_at'   => date('Y-m-d'),
                'updated_at'   => date('Y-m-d'),
            ]
        ];
        DB::table('users')->insert($users);
        $employee = [
            [
                'id_employee'       => 1,
                'id_users'          => 1,
                'user_phone'        => '082110873602',
                'user_job_status'   => 'Admin',
                'created_at'        => date('Y-m-d'),
                'updated_at'        => date('Y-m-d'),
            ],
            [
                'id_employee'       => 2,
                'id_users'          => 2,
                'user_phone'        => '085711250060',
                'user_job_status'   => 'Driver',
                'created_at'        => date('Y-m-d'),
                'updated_at'        => date('Y-m-d'),
            ]
        ];
        DB::table('employee')->insert($employee);
    }
}
