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
            'اضافة خبر',
            'الاقسام',
            'اضاقة قسم',
            'الاحصائيات',
            'الاعددات',
            'تعديل قسم',
            'حذف قسم',
            'الاخبار البطولة',
            'اضافة خبر بطولى',
            'تعديل خبر بطولى',
            ' حذف خبر بطولى',
            'الرياضة النسائيه',
            'اضافة خبر نسائى',
            'تعديل خبر نسائى',
            'حذف خبر نسائى',
            'الاعلانات',
            'اضافة اعلان',
            'تعديل اعلان',
            'حذف اعلان',
         ];

         foreach ($permissions as $permission) {
            Permission::insert(['name' => $permission,'guard_name'=>'admins']);
         }



    }
}
