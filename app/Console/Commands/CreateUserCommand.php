<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {email} {username}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an user and store them in the database.';

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
        $email = $this->argument('email');
        $username = $this->argument('username');
        $password = null;
        $repassword = null;
        
        while (is_null($password)) 
            $password = $this->secret('Please type your password');
        
        while ($repassword != $password) 
            $repassword = $this->secret('Please retype your password once!');
        
        try {
            DB::table('users')->insert(['email' => $email, 'name' => $username, 'password' => bcrypt($password)]);
            $this->info('Create a new user successfully');
        } catch(\Exception $e) {
            $this->error($e->getMessage());
        }
        
        return 0;
    }
}
