<?php

namespace App\View\Composers;

use App\Models\danhmuc;
use App\Models\loaisach;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class MainMenuComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct() {}

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $danhmuc=danhmuc::all();
        $loaisach = loaisach::all();
        $view->with('danhmuc', $danhmuc);
        $view->with('loaisach', $loaisach);
    }
}
