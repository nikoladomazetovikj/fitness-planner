<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([ 'id' => RoleEnum::MEMBER->value, 'name' => RoleEnum::MEMBER->name]);
        Role::create([ 'id' => RoleEnum::COACH->value, 'name' => RoleEnum::COACH->name]);
    }
}
