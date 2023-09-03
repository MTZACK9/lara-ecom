<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $todayDate = Carbon::now()->format('d-m-Y');
        $todayMonth = Carbon::now()->format('m');
        $todayYear = Carbon::now()->format('Y');

        $totalCategories = Category::count();
        $totalBrands = Brand::count();
        $totalProducts = Product::count();

        $totalOrders = Order::count();
        $totalTodayOrders = Order::whereDate('created_at', $todayDate)->count();
        $totalMonthOrders = Order::whereMonth('created_at', $todayMonth)->count();
        $totalYearOrders = Order::whereYear('created_at', $todayYear)->count();

        $totalUsers = User::count();
        $totalNormalUsers = User::where('role_as', '0')->count();
        $totalAdmins = User::where('role_as', '1')->count();



        return view('admin.dashboard', compact('totalCategories', 'totalBrands', 'totalProducts', 'totalOrders', 'totalTodayOrders', 'totalMonthOrders', 'totalYearOrders', 'totalUsers',  'totalNormalUsers', 'totalAdmins'));
    }
}
