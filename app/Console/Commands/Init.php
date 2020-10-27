<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Artisan;

class Init extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init {--type=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize The App';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      $type = $this->option('type') ?? 'app';
      $count = 1;
      $bar = $this->output->createProgressBar($count);

      $bar->start();

      switch ($type) {
        case 'app':
          $this->reset($bar);
          break;
        case 'permissions':
          $this->initPermissions($bar);
          break;
        case 'roles':
          $this->initRoles($bar);
          break;
        default:
          break;
      }

      $bar->finish();

      $this->info(" \nDone");
    }

    public function reset($bar)
    {
      $bar->setMaxSteps($bar->getMaxSteps() + 8);
      $this->info(" Fresh Migration");
      $output['freshDb'] = Artisan::call('migrate:fresh');
      $bar->advance();

      $this->info(" Linking Storage");
      Artisan::call('storage:link');
      $bar->advance();

      $this->initPermissions($bar);

      $this->info(" Generating Events");
      $output['eventGen'] = Artisan::call('event:generate');
      $bar->advance();

      $this->info(" Importing Default Data To Database");
      $output['ImportData'] = Artisan::call('db:import_default_data');
      $bar->advance();

      $this->info(" Running Databaase Seeder");
      $output['dbSeed'] = Artisan::call('db:seed');
      $bar->advance();

      $this->info(" Done");
      // $output['MigrateDB'] = Artisan::call('migrate');
    }

    public function initRoles($bar){
      $roles = ['admin', 'super-admin'];

      $this->info(" \nCreating Roles");

      $bar->setMaxSteps($bar->getMaxSteps() + 1);

      array_map(fn ($role) => Role::create(['name' => $role, 'guard_name' => 'api']), $roles);
      $bar->advance();
    }

    public function initPermissions($bar)
    {
      $permissionNames = [];

      $this->info(" \nCreating Permissions");

      $bar->setMaxSteps($bar->getMaxSteps() + count($permissionNames));

      foreach ($permissionNames as $name) {
        Permission::create(['name' => $name, 'guard_name' => 'api']);
        $bar->advance();
      }
    }
}
