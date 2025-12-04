<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // SỬ DỤNG firstOrCreate() để tìm kiếm người dùng theo email trước.
        // Nếu đã tồn tại, nó sẽ không tạo mới. Nếu chưa, nó sẽ tạo mới.

        User::firstOrCreate(
            ['email' => 'test@example.com'], // 1. Điều kiện tìm kiếm (Chỉ tìm theo email)
            [
                'name' => 'Test User',
                'password' => Hash::make('password'), // 2. Thêm mật khẩu bắt buộc
                // Các cột khác (email_verified_at, v.v.)
                // có thể được thêm vào đây hoặc để factory xử lý.
            ]
        );
    $this->call(ProductSeeder::class);

    }
}
