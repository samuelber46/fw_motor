<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
use App\Models\User;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $motor = Motor::where('id', $id)->first();
        return view('order.index', compact('motor'));
    }

    public function order(Request $request, $id)
    {

        //check if stok is available
        $motor = Motor::where('id', $id)->first();
        if ($motor->stok < $request->jumlah) {
            Alert::error('Gagal', 'Stok tidak mencukupi');
            return redirect()->back()->with('error', 'Stok tidak mencukupi');
        }
        //Check if the user has already ordered the motor with status 0
        // status 0 = belum checkout
        $check_order = Order::where('user_id', auth()->user()->id)
            ->where('status', 0)
            ->first();

        //if order is empty, create new order
        if (empty($check_order)) {
            $motor = Motor::where('id', $id)->first();
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->tanggal = Carbon::now();
            $order->status = 0;
            $order->jumlah_harga = $request->jumlah * $motor->harga;
            $order->save();
        } else {
            $order = Order::where('user_id', auth()->user()->id)
                ->where('status', 0)
                ->first();
            $order->jumlah_harga = $order->jumlah_harga + ($request->jumlah * $motor->harga);
            $order->update();
        }

        //Check if order detail already exist
        $check_order_detail = OrderDetail::where('order_id', $order->id)
            ->where('motor_id', $id)
            ->first();
        if (empty($check_order_detail)) {
            $newOrder = Order::where('user_id', auth()->user()->id)->where('status', 0)->first();

            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $newOrder->id;
            $orderDetail->motor_id = $motor->id;
            $orderDetail->jumlah = $request->jumlah;
            $orderDetail->jumlah_harga = $request->jumlah * $motor->harga;
            $orderDetail->save();
        } else {
            $orderDetail = OrderDetail::where('order_id', $order->id)
                ->where('motor_id', $id)
                ->first();
            $orderDetail->jumlah = $orderDetail->jumlah + $request->jumlah;
            $orderDetail->jumlah_harga = $orderDetail->jumlah_harga + ($request->jumlah * $motor->harga);
            $orderDetail->update();
        }

        Alert::success('Berhasil', 'Pesanan berhasil ditambahkan');
        return redirect()->route('checkout');
    }

    public function checkout()
    {
        $order = Order::where('user_id', auth()->user()->id)->where('status', 0)->first();
        if (!empty($order)) {
            $orderDetails = OrderDetail::where('order_id', $order->id)->get();
        } else {
            $orderDetails = null;
        }
        return view('order.checkout', compact('order', 'orderDetails'));
    }

    public function delete($id)
    {
        //delete jumlah_harga and jumlah from order_detail
        $orderDetail = OrderDetail::where('id', $id)->first();
        $order = Order::where('id', $orderDetail->order_id)->first();
        $order->jumlah_harga = $order->jumlah_harga - $orderDetail->jumlah_harga;
        if ($order->jumlah_harga == 0) {
            $order->delete();
        }
        $order->update();
        $orderDetail->delete();
        Alert::success('Berhasil', 'Pesanan berhasil dihapus');
        return redirect()->route('checkout');
    }

    public function confirm_checkout()
    {
        //check if user alamat is not empty
        $user = User::where('id', auth()->user()->id)->first();
        if (empty($user->alamat)) {
            Alert::error('Gagal', 'Alamat belum diisi');
            return redirect('account');
        }
        $order = Order::where('user_id', auth()->user()->id)->where('status', 0)->first();
        $order->status = 1;
        $order->update();
        //update stok motor
        $orderDetails = OrderDetail::where('order_id', $order->id)->get();
        foreach ($orderDetails as $orderDetail) {
            $motor = Motor::where('id', $orderDetail->motor_id)->first();
            $motor->stok = $motor->stok - $orderDetail->jumlah;
            $motor->update();
        }
        Alert::success('Yay!', 'Terimakasih untuk membeli motor dari kami');
        return redirect()->route('home');
    }
}
