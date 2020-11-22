<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Traits\Authorizable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AuthorizableController extends Controller
{
    use Authorizable, AuthorizesRequests;
}
