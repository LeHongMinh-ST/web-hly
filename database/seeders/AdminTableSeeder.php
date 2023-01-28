<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        self::checkIssetBeforeCreate([
            'username' => 'admin',
            'full_name' => 'Super Admin',
            'email' => 'superadmin@st.vn',
            'is_super_admin' => true,
            'password' => '123456aA@',
        ]);
    }

    private function checkIssetBeforeCreate($data) {
        $admin = User::where('email', $data['email'])->first();
        if (empty($admin)) {
            User::create($data);
        } else {
            $admin->update($data);
        }
    }
}
