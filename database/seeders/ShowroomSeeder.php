<?php

namespace Database\Seeders;

use App\Models\Showroom;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ShowroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Showroom::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['user_id' => 1, 'name' => 'Ferrari A17', 'owner' => 'Febri', 'brand' => 'Ferrari', 'description' => 'Mobil ramah keluarga', 'image' => 'car1.jpg', 'status' => 'Lunas'],
            ['user_id' => 1, 'name' => 'Lamborghini Amida', 'owner' => 'Febri', 'brand' => 'Lamborghini', 'description' => 'Mobil yang sangat mewah', 'image' => 'car2.jpeg', 'status' => 'Lunas'],
            ['user_id' => 2, 'name' => 'Porsche 888', 'owner' => 'Diky', 'brand' => 'Porsche', 'description' => 'Mobil yang bisa jalan sendiri', 'image' => 'car2.jpeg', 'status' => 'Belum Lunas']
        ];

        foreach ($data as $item) {
            Showroom::insert([
                'user_id' => $item['user_id'],
                'name' => $item['name'],
                'owner' => $item['owner'],
                'brand' => $item['brand'],
                'purchase_date' => Carbon::now(),
                'description' => $item['description'],
                'image' => $item['image'],
                'status' => $item['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
