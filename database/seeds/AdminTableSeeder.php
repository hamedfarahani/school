<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            'name'=>'hamed',
            'family'=>'farahani',
            'phone'=>'09371633551',
            'password'=>bcrypt('111111'),
        ]);
        $role = Role::create([
            'name'=>'SuperAdmin',
            'guard_name'=>'admin',
        ]);

        $default_permissions = [
            ['admin.browse','جستجو ادمین'],
            ['admin.read','مشاهده ادمین'],
            ['admin.edit','ویرایش ادمین'],
            ['admin.add','افزودن ادمین'],
            ['admin.delete','حذف ادمین'],


        ];

        foreach($default_permissions as $default_permission){
            $permission = Permission::create([
                'name'=>$default_permission[0],
                'guard_name'=>'admin',
            ]);
            $role->givePermissionTo($permission);
        }

        $admin = Admin::where('phone','09371633551')->first();
        $admin->assignRole('SuperAdmin');
    }
}
