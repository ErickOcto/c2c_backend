<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
public function run()
{
    // USERS
    DB::table('users')->insert([
        ['name'=>'User1','email'=>'u1@mail.com','password'=>Hash::make('123'),'role'=>'buyer'],
        ['name'=>'User2','email'=>'u2@mail.com','password'=>Hash::make('123'),'role'=>'seller'],
        ['name'=>'User3','email'=>'u3@mail.com','password'=>Hash::make('123'),'role'=>'seller'],
        ['name'=>'User4','email'=>'u4@mail.com','password'=>Hash::make('123'),'role'=>'buyer'],
        ['name'=>'Admin','email'=>'admin@mail.com','password'=>Hash::make('123'),'role'=>'admin'],
    ]);

    // CATEGORIES
    DB::table('categories')->insert([
        ['name'=>'Electronics'],
        ['name'=>'Fashion'],
        ['name'=>'Books'],
        ['name'=>'Furniture'],
        ['name'=>'Others'],
    ]);

    // PROFILES
    for ($i=1; $i<=5; $i++) {
        DB::table('profiles')->insert([
            'user_id'=>$i,
            'phone'=>'08123'.$i,
            'address'=>'Address '.$i,
            'city'=>'City '.$i,
        ]);
    }

    // PRODUCTS
    for ($i=1; $i<=5; $i++) {
        DB::table('products')->insert([
            'user_id'=>2,
            'category_id'=>$i,
            'name'=>'Product '.$i,
            'description'=>'Description '.$i,
            'price'=>10000*$i,
            'stock'=>10,
            'status'=>'active',
        ]);
    }

    // PRODUCT IMAGES
    for ($i=1; $i<=5; $i++) {
        DB::table('product_images')->insert([
            'product_id'=>$i,
            'image_url'=>'image'.$i.'.jpg',
        ]);
    }

    // ORDERS
    for ($i=1; $i<=5; $i++) {
        DB::table('orders')->insert([
            'buyer_id'=>1,
            'total_price'=>50000,
            'status'=>'pending',
        ]);
    }

    // ORDER ITEMS
    for ($i=1; $i<=5; $i++) {
        DB::table('order_items')->insert([
            'order_id'=>$i,
            'product_id'=>$i,
            'quantity'=>1,
            'price'=>10000,
        ]);
    }

    // TRANSACTIONS
    for ($i=1; $i<=5; $i++) {
        DB::table('transactions')->insert([
            'order_id'=>$i,
            'payment_method'=>'midtrans',
            'payment_status'=>'paid',
            'paid_at'=>Carbon::now(),
        ]);
    }

    // REVIEWS
    for ($i=1; $i<=5; $i++) {
        DB::table('reviews')->insert([
            'user_id'=>1,
            'product_id'=>$i,
            'rating'=>5,
            'comment'=>'Good product '.$i,
        ]);
    }

    // MESSAGES
    for ($i=1; $i<=5; $i++) {
        DB::table('messages')->insert([
            'sender_id'=>1,
            'receiver_id'=>2,
            'message'=>'Hello '.$i,
        ]);
    }

    // NOTIFICATIONS
    for ($i=1; $i<=5; $i++) {
        DB::table('notifications')->insert([
            'user_id'=>1,
            'title'=>'Notif '.$i,
            'content'=>'Content '.$i,
            'is_read'=>false,
        ]);
    }

    // REPORTS
    for ($i=1; $i<=5; $i++) {
        DB::table('reports')->insert([
            'reporter_id'=>1,
            'product_id'=>$i,
            'reason'=>'Fake product '.$i,
            'status'=>'pending',
        ]);
    }
}
}
