<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Comic;

class ComicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comic::truncate();

       $comics = config('comics');

        foreach ($comics as  $comic) {

            $newComic=new Comic();
            $newComic->title=$comic['title'];
            $newComic->description=$comic['description'];
            $newComic->thumb=$comic['thumb'];
            $newComic->price=str_replace('$','',$comic['price']);
            $newComic->series=$comic['series'];
            $newComic->sale_date=$comic['sale_date'];
            $newComic->type=$comic['type'];
            $newComic->artists=json_encode($comic['artists']);
            // $newComic->artists=implode('|', $comic['artists']);
            $newComic->writers=json_encode($comic['writers']);
            $newComic->save();

        }

        // for($i=0;$i<10;$i++){

        //     $newComic=new Comic();
        //     $newComic->title=fake()->words(rand(1,5), true);
        //     $newComic->description=fake()->paragraph(rand(10,30), true);
        //     $newComic->thumb=fake()->imageUrl();
        //     $newComic->price=fake()->randomFloat(2,1,10);
        //     $newComic->series=fake()->words(2,true);
        //     $newComic->sale_date=fake()->date();
        //     $newComic->type=fake()->words(2,true);
        //     $newComic->artists=json_encode(fake()->words(rand(1,8), false));
        //     $newComic->writers=json_encode(fake()->words(rand(1,8), false));
        //     $newComic->save();
            
        // }


    }
}