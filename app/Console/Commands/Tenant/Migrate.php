<?php

namespace App\Console\Commands\Tenant;

use App\Models\Tenant;
use App\Service\TenantService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Migrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'migrate to all tenants database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $tenants = Tenant::get();
        $tenants->each(function ($tenant){
            TenantService::switchToTenant($tenant);
            $this->info('Start Migration : ' . $tenant->domain);
            $this->info('Start Migration to Database : ' . $tenant->database);
            $this->info('--------------------------------------');
            Artisan::call('migrate --path=database/migrations/tenants/ --database=tenant');
            $this->info(Artisan::output());
            return Command::SUCCESS;

        });
    }
}
