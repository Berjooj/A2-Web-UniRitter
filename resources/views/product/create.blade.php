@extends('product.layout')
@section('content')
    <section class="py-4">
        <div class="container px-lg-5 mt-5">
            <h4>Adicionar novo produto</h4>
        </div>
        <div class="container px-4 px-lg-5 mt-4">
            <form class="needs-validation" novalidate="" action="{{ url('products') }}" method="post">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-6">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="col-6">
                        <label for="category" class="form-label">Categoria</label>
                        <select class="form-select mb-3" name="category" aria-label="example">
                            <option selected>Selecionar</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="date_fabrication" class="form-label">Data de Fabricação</label>
                        <input type="date" name="date_fabrication" class="form-control">
                    </div>

                    <div class="col-6">
                        <label for="is_active" class="form-label">Ativo no sistema?</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="is_active" type="checkbox" role="switch"
                                id="flexSwitchCheckDisabled">
                            <label class="form-check-label" for="flexSwitchCheckDisabled">Desativado</label>
                        </div>
                    </div>
                </div>

                <hr class="my-4">
                <div class="error" style="display: none">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Atenção!</strong> <span class="error-message"></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                                <button class="w-100 btn btn-primary" type="submit">Cadastrar produto</button>
                            </div>
                            <div class="col-6">
                                <a class="w-100 btn btn-danger" href="{{ url('/products') }}">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
