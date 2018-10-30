<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ToolController extends Controller
{

    public function lottery()
    {
        return view('tools.lottery.index');
    }

}
