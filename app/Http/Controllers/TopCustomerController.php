<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopCustomerRequest;
use App\Models\TopCustomer;
use Illuminate\Http\Request;

class TopCustomerController extends Controller
{
    public function index()
    {
        $topCustomers = TopCustomer::all();

        return view('admin.topCustomer.index', compact('topCustomers'));
    }

    public function create()
    {
        return view('admin.topCustomer.create');
    }

    public function store(StoreTopCustomerRequest $request)
    {
        TopCustomer::create($request->except('image') + ['image' => $request->file('image')->store('topCustomers', 'public')]);

        alert()->success('Top Customers has been changed');
        return redirect()->route('top-customer.index');
    }

    public function destroy(TopCustomer $topCustomer)
    {
        $topCustomer->delete();

        alert()->success('Top Customer has been Deleted');
        return redirect()->route('top-customer.index');
    }
}
