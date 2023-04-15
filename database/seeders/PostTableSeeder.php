<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();
//        DB::table('post_categories')->truncate();
        for ($i=1; $i<30; $i++){
            $post = Post::create([
                'title'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry ".$i,
            'content'=>$i." Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
            'status'=>1,
            'description'=>"Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
            'thumbnail'=>'',
//            'language',
            'views'=>0,
            'slug' => 'slug-'.$i,
//            'update_by',
        ]);
            DB::table('post_categories')->insert([
                'category_id'=>$i%7 + 1,
                'post_id'=>$post->id
            ]);
            DB::table('post_categories')->insert([
                'category_id'=>($i+1)%7 + 1,
                'post_id'=>$post->id
            ]);
        }
    }
}
