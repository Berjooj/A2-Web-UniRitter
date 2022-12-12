<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select('products.*', 'categories.name as name_category')
            ->join('categories', function ($join) {
                $join->on('products.category', '=', 'categories.id');
            })
            ->orderBy('products.id')
            ->get();

        return view('product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();

        return view('product.create')->with('categories', $categories)->with('message', '')->with('typeAlert', 'success');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();

            $input['is_active'] = (array_key_exists('is_active', $input) && $input['is_active'] === 'on');

            Product::create($input);

            DB::commit();

            return redirect('products')->with('message', 'Produto cadastrado com sucesso!');
        } catch (Throwable $ex) {
            DB::rollBack();
            return redirect('products/create?error=Erro ao cadastrar o produto, verifique os dados preenchidos e tente novamente.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();

        return view('product.show')->with('categories', $categories)->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();

        return view('product.edit')->with('categories', $categories)->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);

            $input = $request->all();

            $input['is_active'] = (array_key_exists('is_active', $input) && $input['is_active'] === 'on');
            $product->update($input);

            DB::commit();

            return redirect('products')->with('message', 'Produto atualizado com sucesso!');
        } catch (Throwable $ex) {
            DB::rollBack();
            return redirect("products/{$id}/edit?error=Erro ao atualizar o produto, verifique os dados preenchidos e tente novamente.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);

            $product->delete();

            DB::commit();

            return redirect('products')->with('message', 'Produto deletado com sucesso!');
        } catch (Throwable $ex) {
            DB::rollBack();
            return redirect('products')->with('message', 'Erro ao deletar o produto, verifique os dados preenchidos e tente novamente.');
        }
    }
}
