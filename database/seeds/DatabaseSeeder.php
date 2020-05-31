<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pl_PL');

        DB::table('users')->insert([
           'name' => 'Damian Karwacki',
            'email' => 'dk@dk.pl',
            'password' => Hash::make('damian'),
        ]);

        for($i=0; $i<20; $i++)
        {
            DB::table('posts')->insert([
                'title' => $faker->sentence(6, true),
                'trailer' => $faker->text(254),
                'content' => $faker->paragraph(10, true),
                'recipe' => "<ul>
                            <li>Łopatka 1,5 kg</li>
                            <li>Boczek 1 kg</li>
                            <li>Piersi z kurczaka</li>
                            <li>S&oacute;l</li>
                            <li>Pieprz</li>
                        </ul>",
                'user_id' => 1,
                'category_id' => $faker->numberBetween(1, 5),
                'publish' => $faker->numberBetween(0,1),
                'image' => 'https://www.odzywianie.info.pl/img/stories/arts/_665x/przewodnik-po-kielbasach.jpg'
            ]);
        }

        for($i=1; $i<=5; $i++)
        {
            DB::table('categories')->insert([
                'name' => 'Kategoria '.$i,
                'desc' => $faker->paragraph(4, true),
                'avatar' => $i.'.jpg'
        ]);
        }

    }
}
