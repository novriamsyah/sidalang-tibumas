<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = new User;
        $users->nama = "Novri Amsyah";
        $users->username = "superadmin";
        $users->email = "superadmin@gmail.com";
        $users->nip = 1234567890123;
        $users->jabatan = "Superman";
        $users->password = Hash::make('superadmin');
        $users->remember_token = Str::random(60);
        $users->role = "super_admin";
        $users->save();
    }
}
