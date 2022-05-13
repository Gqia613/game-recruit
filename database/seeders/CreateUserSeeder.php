<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CreateUserSeeder extends Seeder
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

        User::truncate();

        $params = [
            [
                'user_name'    => '大城由晃',
                'password'     => Hash::make('password'),
                'icon'         => null,
                'game'         => 'シージ/イナイレ',
                'introduction' => '基本的にシージをメインでやる！',
            ],
            [
                'user_name'    => '関海知瑠',
                'password'     => Hash::make('password'),
                'icon'         => null,
                'game'         => 'シージorサッカー',
                'introduction' => 'サッカーとかシージやってます！',
            ],
            [
                'user_name'    => '島尻武幸',
                'password'     => Hash::make('password'),
                'icon'         => null,
                'game'         => 'シージ',
                'introduction' => 'スモーク使いです',
            ],
            [
                'user_name'    => '大城伊織',
                'password'     => Hash::make('password'),
                'icon'         => null,
                'game'         => 'APEX・イナイレ',
                'introduction' => 'そろそろ東京に来ます',
            ],
            [
                'user_name'    => '岸本龍之介',
                'password'     => Hash::make('password'),
                'icon'         => null,
                'game'         => 'APEXのみ',
                'introduction' => '夜中にずっとゲームしてます！！',
            ],
            [
                'user_name'    => '大城りゅうま',
                'password'     => Hash::make('password'),
                'icon'         => null,
                'game'         => 'パワプロ・シージ',
                'introduction' => '久しぶりにシージしたい',
            ],
            [
                'user_name'    => '大城葵',
                'password'     => Hash::make('password'),
                'icon'         => null,
                'game'         => '特になし',
                'introduction' => 'アニメ好きです',
            ],
            [
                'user_name'    => 'むねちか',
                'password'     => Hash::make('password'),
                'icon'         => null,
                'game'         => 'あんまりやらない',
                'introduction' => '陸上してました',
            ],
            [
                'user_name'    => 'よっしー',
                'password'     => Hash::make('password'),
                'icon'         => null,
                'game'         => 'ウイイレ・フォートナイト',
                'introduction' => '夜活動してます！',
            ],
            [
                'user_name'    => 'みっちー',
                'password'     => Hash::make('password'),
                'icon'         => null,
                'game'         => 'バロラント',
                'introduction' => '最近バロラントハマってます',
            ],
            [
                'user_name'    => 'たーけー',
                'password'     => Hash::make('password'),
                'icon'         => null,
                'game'         => 'ポケモン',
                'introduction' => '育成ゲームが好きです',
            ],
            [
                'user_name'    => 'まさきさん',
                'password'     => Hash::make('password'),
                'icon'         => null,
                'game'         => 'あんまりやらない',
                'introduction' => 'スポーツ好きです',
            ],
            [
                'user_name'    => '新垣結衣',
                'password'     => Hash::make('password'),
                'icon'         => null,
                'game'         => 'RPG',
                'introduction' => '土日にRPGやってます',
            ],
            [
                'user_name'    => '本田翼',
                'password'     => Hash::make('password'),
                'icon'         => null,
                'game'         => 'FPS全般',
                'introduction' => 'めっちゃうまいです',
            ],
            [
                'user_name'    => 'えなこ',
                'password'     => Hash::make('password'),
                'icon'         => null,
                'game'         => 'フォートナイト',
                'introduction' => 'エンジョイ勢です！！！',
            ],
        ];

        User::upsert($params, ['id']);

        // 外部キー貼り直す
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
