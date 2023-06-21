<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     AdminSeeder::class
        // ]);
        // $this->call([
        //     SettingSeeder::class
        // ])
        $permissions = [
            'المشرفين',
            'انشاء مشرف',
            'تعديل مشرف',
            'حذف مشرف',
            'الصلاحيات',
            'اضافة صلاحية',
            'عرض صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',
            'اضافة خبر رئيسى',
            'تعديل خبر رئيسى',
            'حذف خبر رئيسى',
            'الاخبار الرئيسية',
            'الاخبار',
            'حذف خبر',
            'تعديل خبر',
            'الاقسام',
            'تعديل قسم',
            'حذف قسم',
            'الاخبار البطولة',
            'تعديل خبر بطولى',
            ' حذف خبر بطولى',
            'الرياضة النسائيه',
            'الاعلانات'
         ];

         foreach ($permissions as $permission) {
            Permission::insert(['name' => $permission,'guard_name'=>'admins']);
         }



    }
}
