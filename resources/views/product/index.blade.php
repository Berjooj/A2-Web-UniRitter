@extends('product.layout')
@section('content')
    <section class="py-4">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-12 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Data de Fabricação</th>
                            <th scope="col">Data de Registro</th>
                            <th scope="col">Última Atualização</th>
                            <th scope="col">Ativo</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($products))
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->name_category }}</td>
                                    <td>{{ !empty($product->date_fabrication)? Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $product->date_fabrication)->subHours(3)->format('d/m/Y'): '' }}
                                    </td>
                                    <td>{{ !empty($product->created_at)? Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $product->created_at)->subHours(3)->format('d/m/Y'): '' }}
                                    </td>
                                    <td>{{ !empty($product->updated_at)? Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $product->updated_at)->subHours(3)->format('d/m/Y'): '' }}
                                    </td>
                                    <td>{{ $product->is_active ? 'Sim' : 'Não' }}</td>
                                    <td>
                                        <a type="button" class="btn btn-outline-success btn-sm"
                                            href="{{ url('/products/' . $product->id) }}">Visualizar</a>
                                        <a type="button" class="btn btn-outline-primary btn-sm"
                                            href="{{ url('/products/' . $product->id . '/edit') }}">Editar</a>
                                        <form method="POST" action="{{ url('products/delete/' . $product->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                title="Deletar produto">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
