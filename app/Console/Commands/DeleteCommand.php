<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Model\User;
use App\Jobs\DeleteJob;

class DeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hatena:delete';

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
     * @param User $user
     *
     * @return void
     */
    public function handle(User $user)
    {
        $users = $user->where('key', config('hatena.key'))
                      ->where('fails', '<=', 10)
                      ->get();

        foreach ($users as $user) {
            info(class_basename(self::class) . ' : ' . $user->name);
            DeleteJob::dispatch($user);
        }
    }
}
