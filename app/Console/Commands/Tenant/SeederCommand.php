<?php

namespace App\Console\Commands\Tenant;

use App\Models\Tenant;
use App\Service\TenantService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:seeder {class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'seed to tenants';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $class = $this->argument('class');
        $tenants = Tenant::get();
        $tenants->each(function ($tenant) use($class){
            TenantService::switchToTenant($tenant);
            $this->info('Start seeding : '.$tenant->domain);
            $this->info('---------------------------------------');
            Artisan::call('db:seed' , [
                '--class' => 'Database\\Seeders\\Tenants\\'.$class,
                '--database' => 'tenant'
            ]);
            $this->info(Artisan::output());
        });
        return Command::SUCCESS;
    }
}
