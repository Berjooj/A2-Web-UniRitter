<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id')->get();

        return view('category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();

        return view('category.create')->with('categories', $categories)->with('message', '')->with('typeAlert', 'success');
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

            Category::create($input);

            DB::commit();

            return redirect('categories')->with('message', 'Categoria cadastrada com sucesso!');
        } catch (Throwable $ex) {
            DB::rollBack();
            return redirect('categories/create')->with('message', 'Erro ao cadastrar a categoria, verifique os dados preenchidos e tente novamente.');
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
        $category = Category::findOrFail($id);

        return view('category.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('category.edit')->with('category', $category);
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
            $category = Category::findOrFail($id);

            $input = $request->all();

            $category->update($input);

            DB::commit();

            return redirect('categories')->with('message', 'Categoria atualizada com sucesso!');
        } catch (Throwable $ex) {
            DB::rollBack();
            return redirect('categories/{$id}/edit')->with('message', 'Erro ao atualizar a categoria, verifique os dados preenchidos e tente novamente.');
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
            $category = Category::findOrFail($id);

            $category->delete();

            DB::commit();

            return redirect('categories')->with('message', 'Categoria deletada com sucesso!');
        } catch (Throwable $ex) {
            DB::rollBack();
            return redirect('categories')->with('message', 'Erro ao deletar a categoria, verifique os dados preenchidos e tente novamente.');
        }
    }
}
