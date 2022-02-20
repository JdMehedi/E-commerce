<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create Roles
        // $roleSuperAdmin=Role::create(['name' => 'admin']);
        // $roleAdmin=Role::create(['name' => 'admin']);

        // $roleEditor=Role::create(['name' => 'admin']);
        // $roleUser=Role::create(['name' => 'admin']);

        Role::create(['guard_name' => 'web', 'name' => 'consignee']);
        Role::create(['guard_name' => 'web', 'name' => 'shipper']);
        Role::create(['guard_name' => 'web', 'name' => 'party']);
        $roleSuperAdmin = Role::create(['guard_name' => 'web', 'name' => 'admin']);
        Role::create(['guard_name' => 'web', 'name' => 'shipperlogin']);
        Role::create(['guard_name' => 'web', 'name' => 'processor']);
        Role::create(['guard_name' => 'web', 'name' => 'gcl']);
          
        //Permission list as array
        $permissions=[
            //Dashboard
            [
                'group_name'=> 'Role',
                        'permissions'=>[
                            'roles.index',
                            'roles.create',
                            'roles.store',
                            'roles.update',
                            'roles.edit',
                            'roles.destroy',
                            'roles.show',
                        ]
            ],
            [
                'group_name'=> 'User',
                'permissions'=>[
                    'adduser',
                    'userlist',
                    'user.save',
                    'user.edit',
                    'user.delete',
                ]
            ],
            [
                'group_name'=> 'Trucker',
                'permissions'=>[
                    'shipper.index',
                    'shipper.create',
                    'shipper.store',
                    'shipper.update',
                    'shipper.edit',
                    'shipper.destroy',
                    'shipper.show',
                    'user.contact.create',
                    'user.contact.store',
                    'user.contact.edit',
                    'user.contact.destroy',
                    'consignee.index',
                    'consignee.create',
                    'consignee.store',
                    'consignee.edit',
                    'consignee.update',
                    'consignee.destroy',
                    'consignee.show',
                    'consignee.contact.create',
                    'consignee.contact.store',
                    'consignee.contact.edit',
                    'consignee.contact.update',
                    'consignee.contact.destroy',
                ]
            ],
            [
                'group_name'=> 'Order',
                'permissions'=>[
                    'orderLog',
                ]
            ],

        ];
                //Create and Assign Permissions
               
        for($i=0; $i < count($permissions); $i++){
            $permissionGroup= $permissions[$i]['group_name'];
            for($j=0; $j < count($permissions[$i]['permissions']); $j++){
                
            //create Permission
            $permission = Permission::create(['name' =>$permissions[$i]['permissions'][$j],'group_name'=>$permissionGroup]);
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);

                
            }

        }
            

    }
}
