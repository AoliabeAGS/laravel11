@extends('order.layouts.app')

@section('title', 'Editar Pedido')

@section('content')
<h1>Editar Pedido {{ $order->name}}</h1>
<form action="{{ route('orders.update', $order->id) }}" method="post" >
    @csrf()
    @method('PUT')
    <label for="nomeCliente">Nome do Cliente</label>
    <input type="text" name="nomeCliente" id="nomeCliente" value="{{ $order->nomeCliente}}" required>
    <label for="dataPedido">Data do Pedido</label>
    <input type="date" name="dataPedido" id="dataPedido" value="{{ $order->dataPedido}}" required>
    <label for="dataEntrega">Data da Entrega</label >
    <input type="date" name="dataEntrega" id="dataEntrega"  value="{{ $order->dataEntrega}}" required>
    <label for="status">Status</label>
    <select name="status" id="status"  value="{{ $order->status}}" required>
        <option value="Pendente">Pendente</option>
        <option value="Entregue">Entregue</option>
        <option value="Cancelado">Cancelado</option>
    </select>
    <button type="submit">Salvar</button>
</form>
@endsection
