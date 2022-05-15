<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GroupMember;
use Illuminate\Support\Facades\DB;

class GroupMemberSeeder extends Seeder
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
        GroupMember::truncate();

        $params = [
            [
                'group_id' => 1,
                'user_id'  => 1,
            ],
            [
                'group_id' => 2,
                'user_id'  => 1,
            ],
            [
                'group_id' => 3,
                'user_id'  => 1,
            ],
            [
                'group_id' => 4,
                'user_id'  => 4,
            ],
            [
                'group_id' => 5,
                'user_id'  => 5,
            ],
            [
                'group_id' => 6,
                'user_id'  => 6,
            ],
            [
                'group_id' => 7,
                'user_id'  => 7,
            ],
        ];

        GroupMember::upsert($params, ['id']);

        // 外部キー貼り直す
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
