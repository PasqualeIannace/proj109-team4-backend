<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = config("tag");

        foreach ($tags as $tag) {
            $new_tag = new Tag();

            $new_tag->name = $tag["name"];
            $new_tag->save();
        }
    }
}
