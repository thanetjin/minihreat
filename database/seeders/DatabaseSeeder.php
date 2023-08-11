<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $total = User::count();
        if($total > 0){
            echo "There are {$total} users in database \n";
            return ;
        }
        $user = new User();
        $user->name = "admin";
        $user->email = "Admin@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->role = "admin";
        $user->age = 25;
        $user->address = fake()->paragraph();
        $user->save();
        User::factory()->count(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
