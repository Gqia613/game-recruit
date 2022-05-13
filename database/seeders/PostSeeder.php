<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //外部キー制約を一旦外す
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Post::truncate();

        $params = [
            [
                'group_id'    => 1,
                'status_flag' => 1,
            ],
            [
                'group_id'    => 2,
                'status_flag' => 1,
            ],
            [
                'group_id'    => 3,
                'status_flag' => 1,
            ],
            [
                'group_id'    => 4,
                'status_flag' => 1,
            ],
            [
                'group_id'    => 5,
                'status_flag' => 1,
            ],
            [
                'group_id'    => 6,
                'status_flag' => 1,
            ],
            [
                'group_id'    => 7,
                'status_flag' => 1,
            ],
            [
                'group_id' => 8,
                'status_flag' => 1,
            ],
            [
                'group_id' => 9,
                'status_flag' => 1,
            ],
            [
                'group_id' => 10,
                'status_flag' => 1,
            ],
        ];
        
        Post::upsert($params, ['id']);

        // 外部キー貼り直す
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
