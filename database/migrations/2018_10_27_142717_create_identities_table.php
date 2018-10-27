<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateIdentitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('identifies')) {
            Schema::create('identifies', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique()->comment('身份');
            });
        }

        if (!Schema::hasTable('user_has_identifies')) {
            Schema::create('user_has_identifies', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->comment('用户id');
                $table->integer('identify_id')->comment('身份id');
            });
        }

        $identifies = [
            ['name' => '江西师范大学Cubing魔方协会'],
            ['name' => 'Cubing师大官网开发者'],
            ['name' => '2017学年协会理事长'],
            ['name' => '2017学年协会团支书'],
            ['name' => '2018学年协会理事长'],
            ['name' => '2018学年协会团支书'],
        ];
        $user_has_identifies = [
          [
              'user_id' => 1,
              'identify_id' => 1,
          ],
          [
              'user_id' => 2,
              'identify_id' => 2,
          ],
          [
              'user_id' => 2,
              'identify_id' => 4,
          ],
        ];
        DB::table('identifies')->insert($identifies);
        DB::table('user_has_identifies')->insert($user_has_identifies);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identifies');
        Schema::dropIfExists('user_has_identifies');
    }
}
