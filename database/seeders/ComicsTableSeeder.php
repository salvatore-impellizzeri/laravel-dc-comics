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
        $comics = config('comics');

        foreach ($comics as $comic) {
            $newComic = new Comic();
            $newComic->title = $comic['title'];
            $newComic->description = $comic['description'];
            $newComic->thumb = $comic['thumb'];
            $explodedPrice = explode('$', $comic['price']);
            if (isset($explodedPrice[1])) {
                $newComic->price = floatval($explodedPrice[1]);
            } else {
                $newComic->price = null;
            }            
            $newComic->series = $comic['series'];
            $newComic->sale_date = $comic['sale_date'];
            $newComic->type = $comic['type'];
            $newComic->artists = json_encode($comic['artists']);
            $newComic->writers = json_encode($comic['writers']);
            $newComic->save();
        }  
    }
}