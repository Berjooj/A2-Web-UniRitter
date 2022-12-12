@extends('product.layout')
@section('content')
    <section class="py-4">
        <div class="container px-lg-5 mt-5">
            <h4>Visualizar produto</h4>
        </div>
        <div class="container px-4 px-lg-5 mt-4">
            <div class="row">
                <div class="col-6">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" disabled>
                </div>
                <div class="col-6">
                    <label for="category" class="form-label">Categoria</label>
                    <select class="form-select mb-3" name="category" aria-label="example" disabled>
                        <option>Selecionar</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category === $category->id ? 'selected' : null }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label for="date_fabrication" class="form-label">Data de Fabricação</label>
                    <input type="date" name="date_fabrication" class="form-control"
                        value="{{ explode(' ', $product->date_fabrication)[0] }}" disabled>
                </div>

                <div class="col-6">
                    <label for="is_active" class="form-label">Ativo no sistema?</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="is_active" type="checkbox" role="switch"
                            {{ $product->is_active ? 'checked' : '' }} id="flexSwitchCheckDisabled" disabled>
                        <label class="form-check-label" for="flexSwitchCheckDisabled">Desativado</label>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-6">
                            <a class="w-100 btn btn-success"
                                href="{{ url('/products/' . $product->id . '/edit') }}">Editar</a>
                        </div>
                        <div class="col-6">
                            <a class="w-100 btn btn-danger" href="{{ url('/products') }}">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
