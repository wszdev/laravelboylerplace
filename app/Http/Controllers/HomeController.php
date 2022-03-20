<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }



    // my routs
    public function makeMigration(){
        $makeREs = Artisan::call("make:migration test_migration");
        if($makeREs){
            return "Migration Reset Successfully ";
        }
    }

    // public function resetDatabase(){
    //     $makeREs = Artisan::call("migrate:rollback");
    //     if($makeREs){
    //         return "Database Reset Successfully ";
    //     }
    // }
    


    /*****Env file method*****/
    
    public function editENVfile(){
        $envKey ="MAIL_MAILER";
        $envVal = "smtp";

        $path = app()->environmentFilePath();
        $envCont = file_get_contents($path);
        $envCont.= "\n";
        $envStartPos = strpos($envCont, "{$envKey}=");
        $envEndPos = strpos($envCont, "\n", $envStartPos);

        $oldLine = substr($envCont, $envEndPos- $envStartPos);
        
        

        // if(!$envStartPos || !$envEndPos || !$oldLine){
        //     $envCont.= "{$envKey}={$envVal}\n";
        // }else{
        //     $envCont = str_replace($oldLine, "{$envKey} = {$envVal}", $envCont);
        // }

        // $envCont = str_replace($envCont, 0, -1);

        // file_put_contents($path, $envCont);

        // return ['key' => $envKey, 'val'=> $envVal];
    }



}
