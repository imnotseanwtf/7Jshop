<?php

namespace App\Http\Controllers;

use App\Enums\UserTypeEnum;
use App\Models\Order;
use App\Models\Product;
use App\Models\SalesReport;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all()->count();
        $orders = Order::all()->count();
        $products = Product::all()->count();
        $suppliers = User::role(UserTypeEnum::Supplier)->count();
        $sales = SalesReport::all()->count();

        return view('admin.dashboard', compact('users', 'orders', 'products', 'suppliers', 'sales'));
    }

    public function supplierHome()
    {
        return view('supplier.dashboard');
    }

    public function userHome()
    {
        return view('client.dashboard');
    }

    public function staffs()
    {
        $staffs = User::role(UserTypeEnum::Staff)->get();

        return view('supplier.staffList', compact('staffs'));
    }
}
