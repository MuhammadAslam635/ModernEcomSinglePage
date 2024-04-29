<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Premium Condoms', 'slug' => 'premium-condoms', 'image' => 'path/to/image1.jpg', 'qty' => 100, 'sale_qty' => 0, 'price' => 9.99, 'sale_price' => 8.99, 'status' => 'available', 'stock' => 'in_stock', 'description' => 'High-quality latex condoms for enhanced protection.', 'category_id' => 1],
            ['name' => 'Lubricating Cream', 'slug' => 'lubricating-cream', 'image' => 'path/to/image2.jpg', 'qty' => 50, 'sale_qty' => 0, 'price' => 15.00, 'sale_price' => 12.00, 'status' => 'available', 'stock' => 'in_stock', 'description' => 'Water-based lubricating cream for personal use.', 'category_id' => 1],
            ['name' => 'Erectile Dysfunction Tablets', 'slug' => 'ed-tablets', 'image' => 'path/to/image3.jpg', 'qty' => 200, 'sale_qty' => 0, 'price' => 20.00, 'sale_price' => 18.00, 'status' => 'available', 'stock' => 'in_stock', 'description' => 'Effective tablets for managing erectile dysfunction.', 'category_id' => 2],
            ['name' => 'Delay Spray', 'slug' => 'delay-spray', 'image' => 'path/to/image4.jpg', 'qty' => 85, 'sale_qty' => 0, 'price' => 22.50, 'sale_price' => 20.00, 'status' => 'available', 'stock' => 'in_stock', 'description' => 'Spray to delay climax and extend intimacy.', 'category_id' => 2],
            ['name' => 'Premium Condoms', 'slug' => 'premium-condoms2', 'image' => 'path/to/image1.jpg', 'qty' => 100, 'sale_qty' => 0, 'price' => 9.99, 'sale_price' => 8.99, 'status' => 'available', 'stock' => 'in_stock', 'description' => 'High-quality latex condoms for enhanced protection.', 'category_id' => 1],
            ['name' => 'Lubricating Cream', 'slug' => 'lubricating-cream2', 'image' => 'path/to/image2.jpg', 'qty' => 50, 'sale_qty' => 0, 'price' => 15.00, 'sale_price' => 12.00, 'status' => 'available', 'stock' => 'in_stock', 'description' => 'Water-based lubricating cream for personal use.', 'category_id' => 1],
            ['name' => 'Erectile Dysfunction Tablets', 'slug' => 'ed-tablets2', 'image' => 'path/to/image3.jpg', 'qty' => 200, 'sale_qty' => 0, 'price' => 20.00, 'sale_price' => 18.00, 'status' => 'available', 'stock' => 'in_stock', 'description' => 'Effective tablets for managing erectile dysfunction.', 'category_id' => 2],
            ['name' => 'Delay Spray', 'slug' => 'delay-spray2', 'image' => 'path/to/image4.jpg', 'qty' => 85, 'sale_qty' => 0, 'price' => 22.50, 'sale_price' => 20.00, 'status' => 'available', 'stock' => 'in_stock', 'description' => 'Spray to delay climax and extend intimacy.', 'category_id' => 2],

        ];

        DB::table('products')->insert($products);
    }
}
