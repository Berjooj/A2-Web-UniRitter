@extends('product.layout')
@section('content')
    <section class="py-4">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-12 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <h4>Categorias</h4>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Data de Registro</th>
                            <th scope="col">Última Atualização</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($categories))
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ strlen($category->description) > 30 ? substr($category->description, 0, 30) . '...' : $category->description }}
                                    </td>
                                    <td>{{ !empty($category->created_at)? Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $category->created_at)->subHours(3)->format('d/m/Y'): '' }}
                                    </td>
                                    <td>{{ !empty($category->updated_at)? Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $category->updated_at)->subHours(3)->format('d/m/Y'): '' }}
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-outline-success btn-sm"
                                            href="{{ url('/categories/' . $category->id) }}">Visualizar</a>
                                        <a type="button" class="btn btn-outline-primary btn-sm"
                                            href="{{ url('/categories/' . $category->id . '/edit') }}">Editar</a>
                                        <form method="POST" action="{{ url('categories/delete/' . $category->id) }}"
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
