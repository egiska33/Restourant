<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            /**
             *
             *      Admin
             *
             */

            ['id' => 1,
             'name' => 'Admin',
             'email' => 'admin@admin.com',
             'password' => '$2y$10$WQdlP5Yh8b/fCIxDkdFuROw.b.WBQcHNbr5hb0n6DDgebyqcSNJSq',
             'role' => 'admin',
             'remember_token' => ''
            ],
            ];
    }
}
