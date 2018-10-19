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
            $table->string('name')->unique()->comment('用户名');
            $table->string('email')->unique()->comment('邮箱');
            $table->string('password')->comment('密码');
            $table->string('activation_token')->nullable()->comment('激活令牌');
            $table->boolean('activated')->default(false)->comment('已激活');
            $table->string('introduction')->nullable()->comment('个人简介');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('qq')->unique()->nullable()->comment('QQ');
            $table->string('tel')->nullable()->comment('电话');
            $table->string('stuNum')->nullable()->comment('学号');
            $table->string('realname')->nullable()->comment('真实姓名');
            $table->string('WCAID')->nullable()->comment('WCAID');
            $table->rememberToken()->comment('记住我令牌');
            $table->timestamps();
        });

        $users = [
            [
                'name'             => 'Cubing酱',
                'email'            => 'cubing.jxnu@foxmail.com',
                'password'         => bcrypt('cubing2017'),
                'activation_token' => null,
                'activated'        => true,
                'introduction'     => '我是超级可爱迷人的机智的小Cubing！大家可以叫我Cubing酱~',
                'avatar'           => null,
                'qq'               => '3527335801',
                'tel'              => null,
                'stuNum'           => null,
                'realname'         => '江西师范大学Cubing魔方协会',
                'WCAID'            => null,
                'remember_token'   => str_random(10),
                'created_at'       => '2018-10-19 16:51:00',
                'updated_at'       => '2018-10-19 16:51:00',
            ],
            [
                'name'             => '苏亦坤',
                'email'            => 'wujiankun1998@qq.com',
                'password'         => bcrypt('iPadwjk1998'),
                'activation_token' => null,
                'activated'        => true,
                'introduction    ' => 'Cubing师大首席客服',
                'avatar'           => null,
                'qq'               => '646792290',
                'tel'              => '13870919778',
                'stuNum'           => '201626703004',
                'realname'         => '吴健坤',
                'WCAID'            => '2015WUJI01',
                'remember_token'   => str_random(10),
                'created_at'       => '2018-10-19 16:51:00',
                'updated_at'       => '2018-10-19 16:51:00',
            ],
            [
                'name'             => '激活的测试选手',
                'email'            => 'test@test.com',
                'password'         => bcrypt('test'),
                'activation_token' => null,
                'activated'        => true,
                'introduction    ' => null,
                'avatar'           => null,
                'qq'               => null,
                'tel'              => null,
                'stuNum'           => null,
                'realname'         => null,
                'WCAID'            => null,
                'remember_token'   => str_random(10),
                'created_at'       => '2018-10-19 16:51:00',
                'updated_at'       => '2018-10-19 16:51:00',
            ],
            [
                'name'             => '未激活的测试选手',
                'email'            => 'untest@untest.com',
                'password'         => bcrypt('untest'),
                'activation_token' => null,
                'activated'        => false,
                'introduction    ' => null,
                'avatar'           => null,
                'qq'               => null,
                'tel'              => null,
                'stuNum'           => null,
                'realname'         => null,
                'WCAID'            => null,
                'remember_token'   => str_random(10),
                'created_at'       => '2018-10-19 16:51:00',
                'updated_at'       => '2018-10-19 16:51:00',
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
