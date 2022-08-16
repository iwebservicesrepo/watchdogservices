<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller {

    /** + 
     * used to load dashboard page
     * @param Request $request - request type get
     * @return type
     */
    public function index(Request $request) {
        return view('web.subscription');
    }

}
