<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class MasterComposer
{
    public function compose(View $view)
    {
        $user = Auth::user();
        $view->share('user', $user);
    }
}