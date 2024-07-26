<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(20);
        return view('order.index', compact('orders'))->with('success', 'Produto cadatrado com sucesso!');
    }

    public function create()
    {
        return view('order.create');
    }
    public function store(Request $request)
    {
        Order::create($request->all());
        return redirect()->route('orders.index');
    }
    public function edit(string $id)
    {
        if (!$order = Order::find($id)) {
            return redirect()->route('orders.index')->with('error', 'Produto não encontrado!');
        }
        return view('order.edit', compact('order'));
    }

    public function update(Request $request, string $id)
    {
        if (!$order = Order::find($id)) {
            return back()->with('error', 'Produto não encontrado!');
        }
        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        if (!$order = Order::find($id)) {
            return redirect()->route('orders.index')->with('error', 'Produto não encontrado!');
        }
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Produto deletado com sucesso!');
    }

}
