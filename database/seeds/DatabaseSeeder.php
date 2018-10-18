<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        // 初始化用户角色，将 1 号用户指派为『站长』
        $user->assignRole('SuperAdmin');

        // 将 2 号用户指派为『管理员』
        $user = User::find(2);
        $user->assignRole('Admin');
    }
}
