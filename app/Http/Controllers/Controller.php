<?php

namespace App\Http\Controllers;

use App\Services\guest\ControllerService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $controllerService;

 public function __construct(ControllerService $controllerService) {
    $this->controllerService = $controllerService;
 }


    public function index(){

      $products = $this->controllerService->indexData();
        return view('welcome', compact('products'));
    }

    public function dashboard(){

      return $this->controllerService->dashboardView();
    }
}
