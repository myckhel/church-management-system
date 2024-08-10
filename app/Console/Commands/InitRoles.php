<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class InitRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init-roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize default roles into the db';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (Role::first()) return;

        $this->info(" \nCreating Default Roles");

        $roles = [
            'admin', 'super-admin'
        ];

        foreach ($roles as $role) {
            $this->info(" \nCreating $role");
            Role::create(['name' => $role]);
        }
    }
}
