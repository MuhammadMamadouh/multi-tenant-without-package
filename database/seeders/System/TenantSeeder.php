<?php

namespace Database\Seeders\System;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tenant = [
            ['name'=> 'tenant1', 'domain'=>'multi-tenent-app.test' , 'database'=>'tenant1'],
            ['name'=> 'tenant2', 'domain'=>'app1.multi-tenent-app.test' , 'database'=>'tenant2'],
            ['name'=> 'tenant3', 'domain'=>'app2.multi-tenent-app.test' , 'database'=>'tenant3'],
        ];
        DB::table('tenants')->truncate();
        Tenant::insert($tenant);
    }
}
