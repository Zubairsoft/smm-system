<?php

namespace Database\Seeders;

use App\Models\DeliveryWorker;
use Illuminate\Database\Seeder;

class DeliveryWorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deliveryWorkers = DeliveryWorker::factory(200)->make()->chunk(25)->toArray();

        foreach ($deliveryWorkers as $workers) {
            DeliveryWorker::query()->insert($workers);
        }
    }
}
