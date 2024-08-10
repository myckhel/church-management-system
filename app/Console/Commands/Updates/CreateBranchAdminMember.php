<?php

namespace App\Console\Commands\Updates;

use App\Branch;
use App\Member;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CreateBranchAdminMember extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:create-branch-admin-member';

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
        Artisan::call('optimize:clear');

        Branch::all()->map(
            fn (Branch $branch, int $i) => Member::cloneBranch($branch)
                ->assignRole($i ? 'admin' : 'super-admin')
        );

        return 0;
    }
}
