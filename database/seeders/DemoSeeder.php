<?php

namespace Database\Seeders;

use App\Models\{Tenant, Establishment, Room, RoomType, Client, User, Reservation};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create 5 Tenants with 2 Establishments each
        for ($i = 1; $i <= 5; $i++) {
            $tenant = Tenant::create(['slug' => 'hotel-chain-' . $i, 'name' => 'Chain ' . $i, 'plan' => 'enterprise']);
            
            foreach (['City Center', 'Resort Branch'] as $branch) {
                $est = Establishment::create(['tenant_id' => $tenant->id, 'name' => $branch]);

                // Create Users
                User::create(['name' => 'Dir ' . $branch, 'email' => "dir$i" . Str::slug($branch) . "@veloria.test", 'password' => Hash::make('password')]);

                // 2. Create Rooms
                $types = ['Suite', 'Standard', 'Deluxe'];
                foreach ($types as $t) {
                    $type = RoomType::create(['establishment_id' => $est->id, 'name' => $t, 'base_price' => rand(100, 500), 'capacity' => 2]);
                    for ($r = 1; $r <= 20; $r++) {
                        Room::create(['establishment_id' => $est->id, 'room_type_id' => $type->id, 'number' => $t[0] . $r . '-' . bin2hex(random_bytes(2)), 'floor' => rand(1, 5)]);
                    }
                }

                // 3. Create 500 Clients
                $clients = Client::factory()->count(500)->create(['tenant_id' => $tenant->id]);

                // 4. Create 1000 Reservations
                $rooms = Room::where('establishment_id', $est->id)->get();
                for ($res = 0; $res < 1000; $res++) {
                    Reservation::create([
                        'establishment_id' => $est->id,
                        'client_id' => $clients->random()->id,
                        'room_id' => $rooms->random()->id,
                        'check_in' => now()->addDays(rand(1, 30)),
                        'check_out' => now()->addDays(rand(31, 60)),
                        'adults' => rand(1, 2),
                        'rate' => rand(100, 500),
                        'created_by' => 1,
                        'status' => ['confirmed', 'pending_confirmation', 'checked_in'][rand(0, 2)]
                    ]);
                }
            }
        }
    }
}
