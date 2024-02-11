<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin =  Role::create([
            "name" => "Admin"
        ]);

        $roleEdit =  Role::create([
            "name" => "Editor"
        ]);
        //Gestion Roles
        $permissionCreateRole = Permission::create([
            "name" => "Create Roles"
        ]);

        $permissionReadRole = Permission::create([
            "name" => "Read Roles"
        ]);

        $permissionUpdateRole = Permission::create([
            "name" => "Update Roles"
        ]);

        $permissionDeleteRole = Permission::create([
            "name" => "Delete Roles"
        ]);

        //Gestion Lessons
        $permissionCreateLesson = Permission::create([
            "name" => "Create Lessons"
        ]);

        $permissionReadLesson = Permission::create([
            "name" => "Read Lessons"
        ]);

        $permissionUpdateLesson = Permission::create([
            "name" => "Update Lessons"
        ]);

        $permissionDeleteLesson = Permission::create([
            "name" => "Delete Lessons"
        ]);

        //Gestion Categories
        $permissionCreateCategory = Permission::create([
            "name" => "Create Categories"
        ]);

        $permissionReadCategory = Permission::create([
            "name" => "Read Categories"
        ]);

        $permissionUpdateCategory = Permission::create([
            "name" => "Update Categories"
        ]);

        $permissionDeleteCategory = Permission::create([
            "name" => "Delete Categories"
        ]);      


        $permissionsAdmin = [
            $permissionCreateCategory, $permissionReadCategory, $permissionUpdateCategory, $permissionDeleteCategory,
            $permissionCreateLesson, $permissionReadLesson, $permissionUpdateLesson, $permissionDeleteLesson,
            $permissionCreateRole, $permissionReadRole, $permissionUpdateRole, $permissionDeleteRole
        ];

        $permissionEdit = [
            $permissionCreateCategory, $permissionReadCategory, $permissionUpdateCategory, $permissionDeleteCategory,
            $permissionCreateLesson, $permissionReadLesson, $permissionUpdateLesson, $permissionDeleteLesson,
        ];

        //Asignacion de permisos a roles

        $roleAdmin->syncPermissions($permissionsAdmin); //metodo para agregar varias permisos
        $roleEdit->syncPermissions($permissionEdit);
        // $roleAdmin->givePermissionTo($permissionCreateCategory); //un solo permiso


    }
}
