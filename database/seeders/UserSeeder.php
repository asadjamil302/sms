<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use PhpParser\Node\Stmt\Foreach_;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            //SUPER ADMIN PERMISSIONS
            $permission =[
                // for admin 
                [
                    'name' => 'admin_create',
                ],
                [
                    'name' => 'admin_read',
                ],
                [
                    'name' => 'admin_update',
                ],
                [
                    'name' => 'admin_delete',
                ],
                // for teacher
                [
                    'name' => 'teacher_create',
                ],
                [
                    'name' => 'teacher_read',
                ],
                [
                    'name' => 'teacher_update',
                ],
                [
                    'name' => 'teacher_delete',
                ],
                //for super admin
                [
                    'name' => 'super_admin_create',
                ],
                [
                    'name' => 'super_admin_read',
                ],
                [
                    'name' => 'super_admin_update',
                ],
                [
                    'name' => 'super_admin_delete',
                ],
                  //for accountant
                [
                    'name' => 'accountant_create',
                ],
                [
                    'name' => 'accountant_read',
                ],
                [
                    'name' => 'accountant_update',
                ],
                [
                    'name' => 'accountant_delete',
                ],
            
            ];

            
            foreach ($permission as $pr) {
                Permission::create($pr);
            }
            //Admin permission
            $admin_permission=[

                // for admin 
                [
                    'name' => 'admin_create',
                ],
                [
                    'name' => 'admin_read',
                ],
                [
                    'name' => 'admin_update',
                ],
                [
                    'name' => 'admin_delete',
                ],
                // for teacher
                [
                    'name' => 'teacher_create',
                ],
                [
                    'name' => 'teacher_read',
                ],
                [
                    'name' => 'teacher_update',
                ],
                [
                    'name' => 'teacher_delete',
                ],
                
                  //for accountant
                [
                    'name' => 'accountant_create',
                ],
                [
                    'name' => 'accountant_read',
                ],
                [
                    'name' => 'accountant_update',
                ],
                [
                    'name' => 'accountant_delete',
                ],
            
            ];

                //FOR TEACHER PERMISSION 
                $teacher_permission=[

                   
                    // for teacher
                    [
                        'name' => 'teacher_create',
                    ],
                    [
                        'name' => 'teacher_read',
                    ],
                    [
                        'name' => 'teacher_update',
                    ],
                    [
                        'name' => 'teacher_delete',
                    ],
                    
                    
                ];
  

                 //FOR Accountant PERMISSION 
                 $accountant_permission = [

                   
                    // for accountant
                    [
                        'name' => 'accountant_create',
                    ],
                    [
                        'name' => 'accountant_read',
                    ],
                    [
                        'name' => 'accountant_update',
                    ],
                    [
                        'name' => 'accountant_delete',
                    ],
                    
                    
                ];
  




       $role = Role::create([
            'name' => 'super_admin',
        ]);
        $role->givePermissionTo($permission);

        $role2 = Role::create([
            'name' => 'admin',
        ]);
        $role2->givePermissionTo($admin_permission);

        $role3 = Role::create([
            'name' => 'teacher',
        ]);
        $role3->givePermissionTo($teacher_permission);

        $role4 = Role::create([
            'name' => 'accountant',
        ]);
        $role4->givePermissionTo($accountant_permission);

      


        $user = User::create([
            'user_name' => 'Admin',
            'slug' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now()->today(),
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole($role); 
    }
}
