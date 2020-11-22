<?php

namespace App\Http\Controllers\Dashboard\Core\Settings;

use App\Http\Controllers\AuthorizableController;
use Illuminate\Http\Request;
use App\Models\User;

class MailController extends AuthorizableController
{
    
    public function index(Request $request)
    {
        return view('dashboard.core.settings.mail.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'app_mail_mailer' => 'required|in:mailgun',
            'app_mail_from_address' => 'required|email|max:255',
            'app_mail_mailgun_domain' => 'required|max:255',
            'app_mail_mailgun_secret' => 'required|max:255'
        ]);

        setting()->set([
            'app.mail.mailer' => $request->app_mail_mailer,
            'app.mail.from.address' => $request->app_mail_from_address,
            'app.mail.mailgun.domain' => $request->app_mail_mailgun_domain,
            'app.mail.mailgun.secret' => $request->app_mail_mailgun_secret,
        ]);
        
        session()->flash('success-message', __('strings.updated successfully'));
        return redirect()->to(route('dashboard.core.settings.mail.index'));
    }

}
