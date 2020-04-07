<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name' => 'user-list',
                'display_name' => 'List User',
                'description' => 'Danh Sách User'
            ],
            [
                'name' => 'user-show',
                'display_name' => 'Show User',
                'description' => 'Xem User'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create User',
                'description' => 'Tạo User'
            ],
            [
                'name' => 'user-edit',
                'display_name' => 'Edit User',
                'description' => 'Sửa User'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete User',
                'description' => 'Xóa User'
            ],
            [
                'name' => 'role-list',
                'display_name' => 'List Role',
                'description' => 'Danh Sách Role'
            ],
            [
                'name' => 'role-show',
                'display_name' => 'Show Role',
                'description' => 'Xem Role'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Tạo Role'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit Role',
                'description' => 'Sửa Role'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Xóa Role'
            ],
            [
                'name' => 'book-list',
                'display_name' => 'List Book',
                'description' => 'Danh Sách Book'
            ],
            [
                'name' => 'book-show',
                'display_name' => 'Show Book',
                'description' => 'Xem Book'
            ],
            [
                'name' => 'book-create',
                'display_name' => 'Create Book',
                'description' => 'Tạo Book'
            ],
            [
                'name' => 'book-edit',
                'display_name' => 'Edit Book',
                'description' => 'Sửa Book'
            ],
            [
                'name' => 'book-delete',
                'display_name' => 'Delete Book',
                'description' => 'Xóa Book'
            ]
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
