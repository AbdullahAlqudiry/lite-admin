<?php

namespace App\Http\Controllers\Dashboard\Core\Settings;

use App\Http\Controllers\AuthorizableController;
use Illuminate\Http\Request;
use App\Models\User;

class GeneralController extends AuthorizableController
{
    
    public function index(Request $request)
    {
        return view('dashboard.core.settings.general.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'app_name' => 'required|max:255',
            'app_version' => 'required|max:255',
            'app_description' => 'required|max:255',
            'app_language' => 'required|in:ar,en',
            'app_env' => 'required|in:local,production',
            'app_timezone' => 'required',
            'app_allow_register' => 'required|boolean',
            'app_allow_reset_password' => 'required|boolean',
        ]);

        setting()->set([
            'app.name' => $request->app_name,
            'app.version' => $request->app_version,
            'app.description' => $request->app_description,
            'app.language' => $request->app_language,
            'app.env' => $request->app_env,
            'app.debug' => $request->app_env == 'local' ? true : false,
            'app.timezone' => $request->app_timezone,
            'app.allow_register' => $request->app_allow_register,
            'app.allow_reset_password' => $request->app_allow_reset_password,
        ]);
        
        session()->flash('success-message', __('strings.updated successfully'));
        return redirect()->to(route('dashboard.core.settings.general.index'));
    }

}
