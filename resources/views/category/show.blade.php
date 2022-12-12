@extends('product.layout')
@section('content')
    <section class="py-4">
        <div class="container px-lg-5 mt-5">
            <h4>Visualizar categoria</h4>
        </div>
        <div class="container px-4 px-lg-5 mt-4">
            <div class="row">
                <div class="col-12">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}"
                        disabled>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea disabled class="form-control" name="description" aria-label="Descrição" rows="4">{{ trim($category->description) }}</textarea>
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
                                href="{{ url('/categories/' . $category->id . '/edit') }}">Editar</a>
                        </div>
                        <div class="col-6">
                            <a class="w-100 btn btn-danger" href="{{ url('/categories') }}">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
