<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Testing\Fakes\Fake;
use Faker\Factory as Faker;
class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        function generate_name(){
            $kata1 = ['Soto', 'Bakso', 'Mie', 'Rujak', 'Sate', 'Nasi', 'Seblak'];
            $kata2 = ['Semarang', 'Urat', 'Bali', 'Solo', 'Ayam', 'Sapi', 'Domba', 'Ikan'];
    
            return $kata1[array_rand($kata1)] . ' ' .  $kata2[array_rand($kata2)]; 
        }

        $faker = Faker::create();
        for ($i=0; $i < 50; $i++) { 
            # code...
            
            $tmp_name = generate_name();

            DB::table('recipes')->insert([
                'name' => $tmp_name,
                'body' => $faker->realText(180),
                'origin' => str_replace(' ', '+', $tmp_name),
                'image_path' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

       
        
        
        
    }

    
}
