<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // $todayDate = Carbon::now();
        // $orders = Order::whereDate('created_at', $todayDate)->paginate('10');

        $todayDate = Carbon::now()->format('Y-m-d');

        $orders = Order::when($request->date != NULL, function ($q) use ($request) {
            return $q->whereDate('created_at', $request->date);
        }, function ($q) use ($todayDate) {
            $q->whereDate('created_at', $todayDate);
        })
            ->when($request->status != NULL, function ($q) use ($request) {
                return $q->where('status_message', $request->status);
            })->paginate('10');

        return view('admin.orders.index', compact('orders'));
    }
    public function show($orderId)
    {
        $order = Order::where('id', $orderId)->first();

        if ($order) {
            return view('admin.orders.show', compact('order'));
        } else {
            return redirect()->route('admin.orders');
        }
    }

    public function updateOrderStatus($orderId, Request $request)
    {
        $validated = $request->validate([
            'order_status' => 'required',
        ]);
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect()->route('admin.showOrder', $orderId)->with('message', 'Order Status Updated');
        } else {
            return redirect()->route('admin.showOrder', $orderId);
        }
    }

    public function viewInvoice($orderId)
    {
        $order = Order::findOrFail($orderId);

        return view('admin.invoice.generate-invoice', compact('order'));
    }

    public function generateInvoice($orderId)
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        return $pdf->download("invoice_{$orderId}-{$todayDate}.pdf");
    }
}
