<?php

namespace App\Services\guest;

use Illuminate\Support\Facades\Auth;

class ControllerService
{

    public function dashboardView(){
        
        return view((Auth::user()->role == 'admin') ? 'admin.index' : 'customer.index');
    }
    
    
}