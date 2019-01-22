<?php

use Illuminate\Database\Seeder;


class RolesUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('role_user')->insert(['user_id'=>1, 'role_id'=>1]);
      DB::table('role_user')->insert(['user_id'=>1, 'role_id'=>2]);
      DB::table('role_user')->insert(['user_id'=>1, 'role_id'=>3]);
      DB::table('role_user')->insert(['user_id'=>1, 'role_id'=>4]);
      DB::table('role_user')->insert(['user_id'=>2, 'role_id'=>2]);
      DB::table('role_user')->insert(['user_id'=>3, 'role_id'=>3]);
      DB::table('role_user')->insert(['user_id'=>4, 'role_id'=>4]);
      DB::table('role_user')->insert(['user_id'=>5, 'role_id'=>3]);
      DB::table('role_user')->insert(['user_id'=>6, 'role_id'=>4]);
    }
}
