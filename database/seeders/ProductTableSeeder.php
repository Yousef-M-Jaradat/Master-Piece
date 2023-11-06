<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'productName' => 'Sample Product 1',
            'Sdescription' => 'Short description for Sample Product 1',
            'Ldescription' => 'Long description for Sample Product 1',
            'price' => 29.99,
            'stockqty' => 100,
            'categoryId' => 1, // Replace with an existing category ID
            'image1' => 'n1.png',
            'image2' => 'n2.png',
            'image3' => 'n3.png',
        ]);
        DB::table('products')->insert([
            'productName' => 'Sample Product 2',
            'Sdescription' => 'Short description for Sample Product 2',
            'Ldescription' => 'Long description for Sample Product 2',
            'price' => 29.99,
            'stockqty' => 100,
            'categoryId' => 1, // Replace with an existing category ID
            'image1' => 'n2.png',
            'image2' => 'n1.png',
            'image3' => 'n3.png',
        ]);
        DB::table('products')->insert([
            'productName' => 'Sample Product 3',
            'Sdescription' => 'Short description for Sample Product 3',
            'Ldescription' => 'Long description for Sample Product 3',
            'price' => 29.99,
            'stockqty' => 100,
            'categoryId' => 2, // Replace with an existing category ID
            'image1' => 'n3.png',
            'image2' => 'n1.png',
            'image3' => 'n2.png',
        ]);
        DB::table('products')->insert([
            'productName' => 'Sample Product 4',
            'Sdescription' => 'Short description for Sample Product 4',
            'Ldescription' => 'Long description for Sample Product 4',
            'price' => 29.99,
            'stockqty' => 100,
            'categoryId' => 3, // Replace with an existing category ID
            'image1' => 'fer2.jpg',
            'image2' => 'fer4.jpg',
            'image3' => 'fer1.jpg',
        ]);
        DB::table('products')->insert([
            'productName' => 'Sample Product 5',
            'Sdescription' => 'Short description for Sample Product 5',
            'Ldescription' => 'Long description for Sample Product 5',
            'price' => 29.99,
            'stockqty' => 100,
            'categoryId' => 3, // Replace with an existing category ID
            'image1' => 'n7.png',
            'image2' => 'n8.png',
            'image3' => 'n9.png',
        ]);
        DB::table('products')->insert([
            'productName' => 'Sample Product 6',
            'Sdescription' => 'Short description for Sample Product 6',
            'Ldescription' => 'Long description for Sample Product 6',
            'price' => 29.99,
            'stockqty' => 100,
            'categoryId' => 1, // Replace with an existing category ID
            'image1' => 'fer5.jpg',
            'image2' => 'fer2.jpg',
            'image3' => 'fer5.jpg',
        ]);
        DB::table('products')->insert([
            'productName' => 'Sample Product 7',
            'Sdescription' => 'Short description for Sample Product 7',
            'Ldescription' => 'Long description for Sample Product 7',
            'price' => 29.99,
            'stockqty' => 100,
            'categoryId' => 1, // Replace with an existing category ID
            'image1' => 'n13.png',
            'image2' => 'n12.png',
            'image3' => 'n11.png',
        ]);
        DB::table('products')->insert([
            'productName' => 'Sample Product 8',
            'Sdescription' => 'Short description for Sample Product 8',
            'Ldescription' => 'Long description for Sample Product 8',
            'price' => 29.99,
            'stockqty' => 100,
            'categoryId' => 2, // Replace with an existing category ID
            'image1' => 'n8.png',
            'image2' => 'n7.png',
            'image3' => 'n9.png',
        ]);
        DB::table('products')->insert([
            'productName' => 'Sample Product 9',
            'Sdescription' => 'Short description for Sample Product 9',
            'Ldescription' => 'Long description for Sample Product 9',
            'price' => 29.99,
            'stockqty' => 100,
            'categoryId' => 3, // Replace with an existing category ID
            'image1' => 'n11.png',
            'image2' => 'n12.png',
            'image3' => 'n10.png',
        ]);
        DB::table('products')->insert([
            'productName' => 'Sample Product 10',
            'Sdescription' => 'Short description for Sample Product 10',
            'Ldescription' => 'Long description for Sample Product 10',
            'price' => 29.99,
            'stockqty' => 100,
            'categoryId' => 3, // Replace with an existing category ID
            'image1' => 'n10.jpg',
            'image2' => 'n11.png',
            'image3' => 'n12.png',
        ]);
    }
}
