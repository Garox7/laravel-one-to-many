<?php

use App\Post;
use App\Category;
use Illuminate\Http\File;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $category = Category::all('id')->all();

        for ($i=0; $i < 20; $i++) {
            $title = $faker->words(rand(3, 7), true);

            $number = rand(0, 85);
            if($number) {
                $contents = new File(__DIR__ . '/../../storage/app/random_img/picsum' . $number . '.jpg');
                $img_path = Storage::put('uploads', $contents);
            } else {
                $img_path = null;
            }

            Post::create([
                'category_id' => $faker->randomElement($category)->id,
                'slug' => Post::getSlug($title),
                'title' => $title,
                'image' => 'http://picsum.photos/id/' . rand(0,1000) . '/500/400',
                'file_path' => $img_path,
                'content' => $faker->paragraphs(rand(5, 15), true),
                'excerpt' => $faker->paragraph()
            ]);
        }
    }
}
