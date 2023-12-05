<?php

namespace App\Service;

use App\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TenantService
{

    private  $tenant;
    private  $domain;
    private  $database;
    public  function switchToTenant(Tenant $tenant)
    {
        if (!$tenant instanceof Tenant) {
            throw ValidationException::withMessages(['error' => 'Wrong Tenant Value']);
        }
        DB::purge('system');
        Config::set('database.connections.tenant.database', $tenant->database);
        $this->tenant   = $tenant;
        $this->domain   = $tenant->domain;
        $this->database = $tenant->database;
        DB::reconnect('tenant');
        DB::setDefaultConnection('tenant');
    }

    public  function switchToDefault(){
        DB::purge('system');
        DB::purge('tenant');
        DB::reconnect('tenant');
        DB::setDefaultConnection('tenant');
    }

    public  function getTenant(){
        return $this->tenant;
    }
}
