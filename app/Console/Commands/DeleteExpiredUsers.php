<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class DeleteExpiredUsers extends Command
{
    protected $signature = 'users:delete-expired';
    protected $description = 'Delete users who have been marked for deletion after 30 days';

    public function handle()
    {
        $expiredUsers = User::whereNotNull('deleted_at')
                            ->where('deleted_at', '<=', Carbon::now())
                            ->get();

        foreach ($expiredUsers as $user) {
            $user->forceDelete();
        }

        $this->info('Expired users have been deleted.');
    }
}