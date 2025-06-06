<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuccessCarController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
  {
        return "data form __invoke";
    }
}
