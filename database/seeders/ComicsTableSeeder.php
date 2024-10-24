<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comic::truncate();

        $comics = config('comics');

        foreach ($comics as $comic) {
            $comics = new Comic();
            $comics->title = $comic['title'];
            $comics->description = $comic['description'];
            $comics->thumb = $comic['thumb'];
            $priceNumber = floatval(substr($comic['price'],1));   
            $comics->price = $priceNumber;
            $comics->series = $comic['series'];
            $comics->sale_date = $comic['sale_date'];
            $comics->type = $comic['type'];
            $comics->artists = json_encode($comic['artists']);
            $comics->writers = json_encode($comic['writers']);
            $comics->save();
        }  
    }
}