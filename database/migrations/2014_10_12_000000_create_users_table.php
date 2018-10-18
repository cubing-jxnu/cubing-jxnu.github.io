<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('id自增');
            $table->string('name')->comment('用户名');
            $table->string('email')->unique()->comment('邮箱');
            $table->string('password')->comment('密码');
            $table->integer('qq')->nullable()->comment('QQ');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('introduction')->nullable()->comment('个人简介');
            $table->rememberToken();
            $table->timestamps();
        });

        $users = [
            [
                'name'      => 'SuperAdmin',
                'email'     => 'superadmin@admin.com',
                'password'  => bcrypt('superadmin')
            ],
            [
                'name'      => '苏亦坤',
                'email'     => 'wujiankun1998@qq.com',
                'password'  => bcrypt('iPadwjk1998')
            ],
        ];

        DB::table('users')->insert($users);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
