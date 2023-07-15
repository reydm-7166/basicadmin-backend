<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct
    (
        protected Product $product,
        protected User $user,
    )
    {}

    public function index()
    {
        return Inertia('Admin/Dashboard', [
            'products' => $this->product->count(),
            'users' => $this->user->count(),
            'categories' => $this->product->distinct()->pluck('category')->count(),
        ]);
    }
}
