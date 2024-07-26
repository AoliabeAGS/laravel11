@extends('order.layouts.app')
@section('title', 'Pedidos')

@section('content')


<h1 class="flex-container">Pedidos</h1>
<div class="flex-container">
    <button type="button" class="btn btn-primary gap-10" data-toggle="modal" data-target="#createOrderModal" >
        Novo Pedido
    </button>
</div>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Cliente</th>
            <th>Data do pedido</th>
            <th>Data da entrga</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->nomeCliente }}</td>
            <td>{{ $order->dataPedido }}</td>
            <td>{{ $order->dataEntrega }}</td>
            <td>{{ $order->status }}</td>
            <td class="flex-container">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editOrderModal-{{ $order->id }}">
                    Editar
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteOrderModal-{{ $order->id }}">
                    Excluir
                </button>
            </td>
        </tr>

        <!-- Edit Order Modal -->
        <div class="modal fade" id="editOrderModal-{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="editOrderModalLabel-{{ $order->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editOrderModalLabel-{{ $order->id }}">Editar Pedido</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('orders.update', $order->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nomeCliente-{{ $order->id }}">Nome do Cliente</label>
                                <input type="text" class="form-control" name="nomeCliente" id="nomeCliente-{{ $order->id }}" value="{{ $order->nomeCliente }}" required>
                            </div>
                            <div class="form-group">
                                <label for="dataPedido-{{ $order->id }}">Data do Pedido</label>
                                <input type="date" class="form-control" name="dataPedido" id="dataPedido-{{ $order->id }}" value="{{ $order->dataPedido }}" required>
                            </div>
                            <div class="form-group">
                                <label for="dataEntrega-{{ $order->id }}">Data da Entrega</label>
                                <input type="date" class="form-control" name="dataEntrega" id="dataEntrega-{{ $order->id }}" value="{{ $order->dataEntrega }}" required>
                            </div>
                            <div class="form-group">
                                <label for="status-{{ $order->id }}">Status</label>
                                <select class="form-control" name="status" id="status-{{ $order->id }}" required>
                                    <option value="">Selecione o status</option>
                                    <option value="Pendente" {{ $order->status == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                                    <option value="Entregue" {{ $order->status == 'Entregue' ? 'selected' : '' }}>Entregue</option>
                                    <option value="Cancelado" {{ $order->status == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Order Modal -->
        <div class="modal fade" id="deleteOrderModal-{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteOrderModalLabel-{{ $order->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteOrderModalLabel-{{ $order->id }}">Excluir Pedido</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que deseja excluir o pedido de {{ $order->nomeCliente }}?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <tr>
            <td colspan="100">Nenhum registro encontrado</td>
        </tr>
        @endforelse
    </tbody>
</table>
{{ $orders->links() }}

<!-- Create Order Modal -->
<div class="modal fade" id="createOrderModal" tabindex="-1" role="dialog" aria-labelledby="createOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createOrderModalLabel">Novo Pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('orders.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nomeCliente">Nome do Cliente</label>
                        <input type="text" class="form-control" name="nomeCliente" id="nomeCliente" required>
                    </div>
                    <div class="form-group">
                        <label for="dataPedido">Data do Pedido</label>
                        <input type="date" class="form-control" name="dataPedido" id="dataPedido" required>
                    </div>
                    <div class="form-group">
                        <label for="dataEntrega">Data da Entrega</label>
                        <input type="date" class="form-control" name="dataEntrega" id="dataEntrega" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="">Selecione o status</option>
                            <option value="Pendente">Pendente</option>
                            <option value="Entregue">Entregue</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
