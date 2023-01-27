<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->insert([
            [
                "id" => 1,
                "name" => "Barbara Reyes",
                "supplier" => "Geraldine Hurst",
                "quantity" => "16",
                "buying_price" => "446",
                "marked_price" => "722",
                "created_at" => "2023-01-07 06:13:42",
                "updated_at" => "2023-01-07 06:13:42"
            ],
            [
                "id" => 2,
                "name" => "Irene Knight",
                "supplier" => "Geraldine Hurst",
                "quantity" => "620",
                "buying_price" => "923",
                "marked_price" => "647",
                "created_at" => "2023-01-07 06:13:49",
                "updated_at" => "2023-01-07 06:13:49"
            ],
            [
                "id" => 3,
                "name" => "Diana Baird",
                "supplier" => "Dennis Boone",
                "quantity" => "829",
                "buying_price" => "918",
                "marked_price" => "1079",
                "created_at" => "2023-01-07 06:14:05",
                "updated_at" => "2023-01-07 06:14:05"
            ],
            [
                "id" => 4,
                "name" => "Quynn Watts",
                "supplier" => "Geraldine Hurst",
                "quantity" => "315",
                "buying_price" => "457",
                "marked_price" => "577",
                "created_at" => "2023-01-07 06:14:12",
                "updated_at" => "2023-01-07 06:14:12"
            ],
            [
                "id" => 5,
                "name" => "Charles Hoover",
                "supplier" => "Geraldine Hurst",
                "quantity" => "398",
                "buying_price" => "101",
                "marked_price" => "848",
                "created_at" => "2023-01-07 06:14:19",
                "updated_at" => "2023-01-07 06:14:19"
            ]
        ]);
    }
}
