<?php

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 4; $i++) {
            $title = $faker->words(rand(3, 7), true);

            $post = new Post();
            $post->slug = $title;
            $post->title = $title;
            $post->image = 'http://picsum.photos/id/' . rand(0,1000) . '/500/400';
            $post->content = $faker->paragraphs(rand(5,15), true);
            $post->excerpt = $faker->paragraph();
            $post->save();
        }
    }
}
