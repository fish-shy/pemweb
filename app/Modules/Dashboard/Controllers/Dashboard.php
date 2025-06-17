<?php
namespace App\Modules\Dashboard\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController {
        
    public function index() {
        $data = [
            'title' => 'dashboard',
            'content' => 'App\Modules\Dashboard\Views\v_dashboard', 
        ];
        return view('App\Views\template', $data);
    }

}