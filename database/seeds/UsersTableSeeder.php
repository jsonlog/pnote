<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //权限
        $pid = DB::table('permissions')->insertGetId([
            'name' =>"Admin",
            'guard_name' =>'web',
        ]);

        //角色
        $rid = DB::table('roles')->insertGetId([
            'name' =>"Admin",
            'guard_name' =>'web',
        ]);

        //角色权限
        DB::table('role_has_permissions')->insertGetId([
            'permission_id' =>$pid,
            'role_id' =>$rid,
        ]);

        //角色权限
        DB::table('model_has_roles')->insertGetId([
            'role_id' =>$rid,
            'model_type' =>"App\User",
            'model_id'=>1
        ]);

        //用户表
        $uid = DB::table('users')->insertGetId ([
            'name' =>"admin",
            'email' =>'admin@gmail.com',
            'password' =>Hash::make("admin")
        ]);

    }
}
