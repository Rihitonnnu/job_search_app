<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//dashboardへ遷移する際、変数userを渡す役割
class DashboardController extends Controller
{
    public function show(){
        $user=User::find(Auth::id());
        return view('user.dashboard',compact('user'));
    }
}
