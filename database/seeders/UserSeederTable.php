<?php

namespace Database\Seeders;

use App\Enums\User\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::checkIssetBeforeCreate([
            'username' => 'admin',
            'name' => 'Super Admin',
            'email' => 'hongminhle290@gmail.vn',
            'role' => UserRole::Admin,
            'password' => '123456aA@',
        ]);
    }

    private function checkIssetBeforeCreate(array $data): void
    {
        $admin = User::where('email', $data['email'])->first();
        if (empty($admin)) {
            User::create($data);
        } else {
            $admin->update($data);
        }
    }
}
