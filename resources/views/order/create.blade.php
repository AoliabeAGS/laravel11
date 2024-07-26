@extends('order.layouts.app')

@section('title', 'Novo Pedido')

@section('content')
<h1>Novo Pedido</h1>
<form action="{{ route('orders.store') }}" method="post" >
    @csrf()
    <label for="nomeCliente">Nome do Cliente</label>
    <input type="text" name="nomeCliente" id="nomeCliente" required>

    <label for="dataPedido">Data do Pedido</label>
    <input type="date" name="dataPedido" id="dataPedido" required>

    <label for="dataEntrega">Data da Entrega</label>
    <input type="date" name="dataEntrega" id="dataEntrega" required>

    <label for="status">Status</label>
    <select name="status" id="status" required>
        <option value="">Selecione o status</option>
        <option value="Pendente">Pendente</option>
        <option value="Entregue">Entregue</option>
        <option value="Cancelado">Cancelado</option>
    </select>

    <button type="submit">Salvar</button>
</form>
@endsection
