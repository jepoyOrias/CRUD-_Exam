<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{

    public function profile(){

        return response()->json(auth()->user());


    }
}
