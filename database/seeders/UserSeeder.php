<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'Febri', 'email' => 'febri@febri.com', 'password' => bcrypt('12345678'), 'telephone' => '08123456789'],
            ['name' => 'Diky', 'email' => 'diky@diky.com', 'password' => bcrypt('12345678'), 'telephone' => '08123456789']
        ];

        foreach ($data as $item) {
            User::insert([
                'name' => $item['name'],
                'no_hp' => $item['telephone'],
                'email' => $item['email'],
                'password' => $item['password'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
