<?php

namespace App\Http\ViewComposers;

use App\MenuItem;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Theme;

class SideBarMenuComposer
{
    public function compose(View $view)
    {
        
        $userId = Auth::user()->id;
        $themes = Theme::where('user_id', $userId)->with('notes')->get();
        $view->with('themes', $themes);
    }
}