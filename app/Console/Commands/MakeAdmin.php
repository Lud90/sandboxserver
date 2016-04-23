<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\User;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:make {email} {--password} {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Admin';

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
     * @return mixed
     */
    public function handle()
    {
        $data = [];
        if($this->option("password")){
            //get the user to put in a password and confirmation
            $password = $this->secret('Enter a password:');
            $confirm = $this->secret('Enter the password again to confirm:');

            //make sure they match
            if($password != $confirm){
                $this->error("Passwords do not match!");
                return;
            }
            $data['password'] = $password;
        }else{
            //generate a random password
            $data['password'] = str_random(16);
            $this->info("Randomly generated password: ".$data['password']);
        }
        //Use provided name or empty string
        $data['name'] = ($this->option("name") ?: '');

        $data['email'] = $this->argument("email");

        //Create the admin
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

    }
}
