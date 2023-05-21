<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'user_id' => sprintf(
                '%1$s-%2$s-%2$s-%2$s-%3$s',
                str_repeat('0', 8),
                str_repeat('0', 4),
                str_repeat('0', 12),
            ),
            'last_name' => 'admin',
            'first_name' => 'system',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'is_active' => true,
            'is_admin' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
