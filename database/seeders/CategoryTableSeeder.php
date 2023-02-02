<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        Category::create([
            'name'=>'Sức khỏe',
            'order'=>1,
            'status'=>1,
            'create_by'=>User::first()->id,
            'update_by'=>User::first()->id,
        ]);
        Category::create([
            'name'=>'Thực phẩm',
            'order'=>2,
            'status'=>1,
            'create_by'=>User::first()->id,
            'update_by'=>User::first()->id,
        ]);
        Category::create([
            'name'=>'Du lịch',
            'order'=>3,
            'status'=>1,
            'create_by'=>User::first()->id,
            'update_by'=>User::first()->id,
        ]);
        Category::create([
            'name'=>'Bảo hiểm',
            'order'=>4,
            'status'=>1,
            'create_by'=>User::first()->id,
            'update_by'=>User::first()->id,
        ]);
        Category::create([
            'name'=>'Công nghệ',
            'order'=>5,
            'status'=>1,
            'create_by'=>User::first()->id,
            'update_by'=>User::first()->id,
        ]);
        Category::create([
            'name'=>'Bất động sản',
            'order'=>6,
            'status'=>1,
            'create_by'=>User::first()->id,
            'update_by'=>User::first()->id,
        ]);
        Category::create([
            'name'=>'Đầu tư',
            'order'=>7,
            'status'=>1,
            'create_by'=>User::first()->id,
            'update_by'=>User::first()->id,
        ]);
    }
}
