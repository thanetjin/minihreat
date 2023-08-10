<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Aartox";
        $user->email = "aatox@example.com";
        $user->password = Hash::make("password");
        $user->role = "admin";
        $user->age = "666";
        $user->address = "End of The World";
        $user->save();

        $user = User::factory()->count(10)->create();
    }
}
