<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        // Superadmin
        $superadmin = User::create([
            'name'      => 'Josmar Salvador',
            'last_name' => 'Marroquin Parra',
            'email'     => 'josmarmp96@gmail.com',
            'password'  => Hash::make('FitNix@2021'),
            'height'    => '170',
            'gender'    => 0,
            'level'     => 1,
            'birthday'  => Carbon::parse('1996-11-29')
        ]);
        
        $superadmin->assignRole('superadmin');
        
        
    }
}
