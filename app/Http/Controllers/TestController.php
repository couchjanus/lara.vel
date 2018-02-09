<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class TestController extends Controller 
{

    public function index()       
    {
        return view(test);
    }
    
    public function hello()       
    {
        // используя with()
        
        return view('hellotest')->with('name', 'Janus Nic');

    }

    public function bax()       
    {
        return view('hellotest')->withName('Bax And Janus Nic With Name');
    }

    public function baz()       
    {
        return view('hellotest', ['name' => 'Baz Janus Nic As Name']);
    }


}
