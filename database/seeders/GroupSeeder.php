<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 外部キーを一旦はずす
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Group::truncate();

        $params = [
            [
                'group_name'  => 'CAG',
                'leader_id'   => 1,
                'icon'        => null,
                'capacity'    => 5,
                'recruitment' => 7,
                'description' => 'エンジョイ勢です。楽しみましょう！',
                'style_id'    => 1,
                'game_id'     => 2,
            ],
            [
                'group_name'  => 'FAVgaming',
                'leader_id'   => 2,
                'icon'        => null,
                'capacity'    => 8,
                'recruitment' => 8,
                'description' => 'ガチ勢です。本気でやります！',
                'style_id'    => 2,
                'game_id'     => 4,
            ],
            [
                'group_name'  => '戦国gaming',
                'leader_id'   => 3,
                'icon'        => null,
                'capacity'    => 6,
                'recruitment' => 6,
                'description' => '毎週火曜日活動中です',
                'style_id'    => 2,
                'game_id'     => 5,
            ],
            [
                'group_name'  => 'Fnatic',
                'leader_id'   => 4,
                'icon'        => null,
                'capacity'    => 5,
                'recruitment' => 7,
                'description' => 'ゆるーいエンジョイ勢です！！',
                'style_id'    => 1,
                'game_id'     => 4,
            ],
            [
                'group_name'  => '父の背中',
                'leader_id'   => 5,
                'icon'        => null,
                'capacity'    => 2,
                'recruitment' => 2,
                'description' => '雑魚チームです',
                'style_id'    => 1,
                'game_id'     => 5,
            ],
            [
                'group_name'  => 'TeamBDS',
                'leader_id'   => 6,
                'icon'        => null,
                'capacity'    => 4,
                'recruitment' => 4,
                'description' => 'shaiko強すぎ！！！',
                'style_id'    => 2,
                'game_id'     => 9,
            ],
            [
                'group_name'  => '魚群',
                'leader_id'   => 7,
                'icon'        => null,
                'capacity'    => 2,
                'recruitment' => 2,
                'description' => '最近できました！！',
                'style_id'    => 2,
                'game_id'     => 9,
            ],
        ];

        Group::upsert($params,['id']);

        // 外部キー貼り直す
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
