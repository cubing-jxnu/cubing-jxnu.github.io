<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SeedRolesAndPermissionsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 清除缓存
        app()['cache']->forget('spatie.permission.cache');

        // 先创建权限
        Permission::create(['name' => 'manage_contents']);
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'edit_settings']);

        // 创建站长角色，并赋予权限
        $SuperAdmin = Role::create(['name' => 'SuperAdmin']);
        $SuperAdmin->givePermissionTo('manage_contents');
        $SuperAdmin->givePermissionTo('manage_users');
        $SuperAdmin->givePermissionTo('edit_settings');

        // 创建管理员角色，并赋予权限
        $Admin = Role::create(['name' => 'Admin']);
        $Admin->givePermissionTo('manage_contents');
        $Admin->givePermissionTo('manage_users');


                
        $model_has_roles = [
            [
                'role_id'    => '1',
                'model_type' => 'App\Models\User',
                'model_id'   => '1'
            ],
            [
                'role_id'    => '2',
                'model_type' => 'App\Models\User',
                'model_id'   => '2'
            ],
        ];

        DB::table('model_has_roles')->insert($model_has_roles);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 清除缓存
        app()['cache']->forget('spatie.permission.cache');

        // 清空所有数据表数据
        $tableNames = config('permission.table_names');

        Model::unguard();
        DB::table($tableNames['role_has_permissions'])->delete();
        DB::table($tableNames['model_has_roles'])->delete();
        DB::table($tableNames['model_has_permissions'])->delete();
        DB::table($tableNames['roles'])->delete();
        DB::table($tableNames['permissions'])->delete();
        Model::reguard();
    }
}
