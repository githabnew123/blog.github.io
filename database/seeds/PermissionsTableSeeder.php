<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =[
        	'manage-post',
        	'manage-user',
        	'manage-comment',
        	'manage-category'
        ];
        foreach ($permissions as $permission) {
        	Permission::create(['name'=>$permission]);
        }
    }
}
