<?php

namespace Database\Seeders;

use App\Models\InvitationCode;
use App\Models\User;

use Database\Factories\InvitationCodeFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        InvitationCode::factory()->count(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    }


}
