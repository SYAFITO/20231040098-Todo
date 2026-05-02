<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Ayo Belajar',
            'email' => 'belajar@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $cat = Category::create([
            'name' => 'Electronics'
        ]);

        Product::create([
            'name' => 'Laptop Asus',
            'quantity' => 5,
            'price' => 8500000,
            'user_id' => $admin->id,
            'category_id' => $cat->id,
        ]);

        Product::create([
            'name' => 'Mouse Logitech',
            'quantity' => 20,
            'price' => 250000,
            'user_id' => $admin->id,
            'category_id' => $cat->id,
        ]);
    }
}