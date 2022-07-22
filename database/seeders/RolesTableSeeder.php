<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Silber\Bouncer\Database\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::count() === 1) {
            $doctor = Role::create([
                'name' => 'doctor',
                'title' => "Doctor",
                'scope' => 1,
            ]);

            $frontdesk = Role::create([
                'name' => 'front desk',
                'title' => "Front Desk",
                'scope' => 1,
            ]);

            $permissions = [];

            $doctor_permissions = json_decode(file_get_contents(
                "database/seeders/roles/doctor_permissions.json"
            ), true);
            foreach ($doctor_permissions as $permission) {
                $permissions[] = [
                    'ability_id' => $permission["ability_id"],
                    'entity_id' => $doctor->id,
                    'entity_type' => 'roles',
                    'forbidden' => 0,
                    'scope' => 1
                ];
            }

            $frontdesk_permissions = json_decode(file_get_contents(
                "database/seeders/roles/frontdesk_permissions.json"
            ), true);
            foreach ($frontdesk_permissions as $permission) {
                $permissions[] = [
                    'ability_id' => $permission["ability_id"],
                    'entity_id' => $frontdesk->id,
                    'entity_type' => 'roles',
                    'forbidden' => 0,
                    'scope' => 1
                ];
            }

            DB::table('permissions')->insert($permissions);
        }
    }
}
