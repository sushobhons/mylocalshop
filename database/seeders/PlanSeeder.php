<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::insert([
            ['name'=>'Basic','monthly_fee'=>0,'max_handling_charge_allowed'=>50],
            ['name'=>'Pro','monthly_fee'=>499,'max_handling_charge_allowed'=>200],
        ]);
    }
}
