<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $ps = [
            0 => ["permission", "Permission", "Permission menu that goes under ACL"],
            1 => ["role", "Role", "Role menu that goes under ACL"],
            2 => ["user", "User", "User menu that goes under ACL"],
        ];
        $superAdmin = Role::find(2);
        $admin = Role::find(3);
        foreach ($ps as $p){
            $a = new Permission;
            $a->name = $p[0];
            $a->display_name = $p[1];
            $a->description = $p[2];
            $a->save();
            $superAdmin->attachPermission($a);
            $admin->attachPermission($a);
        }
    }
}
