<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'over_name' => '晴天',
            'under_name' => '空',
            'over_name_kana' => 'はるぞら',
            'under_name_kana' => 'そら',
            'mail_address' => 'sorazora@gmail.com',
            'sex' => '1',
            'birth_day' => '19980524',
            'role' => '1',
            'password' => bcrypt('sorazora'),
        ]);

    }
}
