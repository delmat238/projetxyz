<?php

namespace Database\Factories;


use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InvitationCodeFactory extends Factory
{

    public function definition(): array
    {
        return [
            'code' => str::upper(fake()->bothify('????-####-????')),
            'host_id' => User::factory(),
            'guest_id' => null,
            'consumed_at' => null,
            'created_at' => now(),
        ];
    }
}
