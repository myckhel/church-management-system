<?php

namespace App\Console\Commands;

use App\Branch;
use App\Member;
use App\Setting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class Update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $settings = Setting::whereIn('name', ['version_name', 'version_code'])->get();

        $assocSetting = Setting::toAssoc($settings);

        $version = config('app.version');
        $versionCode = (int) $version['code'];
        $versionName = $version['name'];
        $serverVersionCode = (int) ($assocSetting['version_code'] ?? 0);

        if ($versionCode > $serverVersionCode) {
            DB::transaction(function () use ($versionCode, $versionName) {
                Artisan::call('migrate');

                $this->{"v{$versionCode}"}();

                Setting::setVersion($versionName, $versionCode);
            });
        }

        return 0;
    }

    function v1()
    {
        Artisan::call('update:create-branch-admin-member');
    }
}
