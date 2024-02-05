<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    public function show(Product $product)
    {
        $product->load('productImages', 'user');

        return view('client.order.show', compact('product'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->validated() + ['user_id' => auth()->id()]);
        $product = Product::find($request->product_id);
        $total = $request->quantity * $product->price;
        $order->update(['total' => $total]);

        alert()->success('Order has been sucessfully placed');
        return redirect()->route('order.index');
    }

    public function index()
    {
        if (
            auth()
            ->user()
            ->hasRole('admin')
        ) {
            $orders = Order::with('product.productImages')
                ->where('status', '<=', 3)
                ->get();
        } elseif (
            auth()
            ->user()
            ->hasRole('staff')
        ) {
            $orders = Order::with('product.productImages')->get();
        } else {
            $orders = Order::with('product.productImages')
                ->where('user_id', auth()->id())
                ->get();
        }

        return view('client.order.index', compact('orders'));
    }

    public function complete(Order $order)
    {
        $order->update(['status' => '1']);
        alert()->success('Order has been sucessfully completed');

        return redirect()->route('order.index');
    }

    public function cancel(Order $order)
    {
        $order->update(['status' => '2']);

        alert()->success('Order has been sucessfully canceled');

        return redirect()->route('order.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order.index');
    }

    public function archive(Order $order)
    {
        $order->update(['status' => 4]);

        alert()->success('Order has been deleted');
        return redirect()->route('quotation.index');
    }

    public function restore(Order $order)
    {
        $order->update(['status' => 0]);

        alert()->success('Order has been restore');
        return redirect()->route('quotation.index');
    }

    public function archiveTable()
    {
        $archives = Order::where('status', '=', '4')->get();

        return view('orderArchive.index', compact('archives'));
    }
    public function receiptOrder($id)
    {
        $order = Order::with('product', 'user')->find($id);
        $pdf = PDF::loadView('pdf.receipt', compact('order'));

        return $pdf->inline();
    }
}
