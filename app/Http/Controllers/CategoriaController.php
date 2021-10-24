<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use App\Categoria;
use App\Http\Requests\CategoriasRequest;

class CategoriaController extends Controller {

    private $categoria;
    private $request;

    public function __construct(Categoria $categoria, Request $request) {

        $this->categoria = $categoria;
        $this->request = $request;
    }

    public function listar() {
        $categorias = Categoria::all();

        return view('categoria.listagem')->with(['categorias' => $categorias]);
    }

    public function novo() {
        return view('categoria.formulario');
    }

    public function adiciona(CategoriasRequest $request) {

        Categoria::create($request->all());
        Request::session()->flash('message.level', 'success');
        Request::session()->flash('message.content', 'Categoria Adicionada com Sucesso!');

        return redirect()->action('CategoriaController@listar')->withInput(Request::only('nome'));
    }

    public function edit($id) {

        $title = "Editar Categoria";

        $c = $this->categoria->find($id);

        return view('categoria.edita', compact('title', 'c'));
    }

    public function update(CategoriasRequest $request, $id) {

        $dataCategoria = $request->all();

        $categoria = $this->categoria->find($id);

        $update = $categoria->update($dataCategoria);

        if ($update)
            return redirect()
                            ->action('CategoriaController@listar')
                            ->with(['sucess' => 'Cadastro realizado com sucesso']);
        else
            return redirect()
                            ->route('CategoriaController@listar')
                            ->withErrors(['errors' => 'Falhar ao cadastrar...'])
                            ->withInput();
    }

    public function show($id) {

        $categoria = $this->categoria->find($id);

        if (empty($categoria)) {
            return "Essa categoria não existe";
        }
        return view('categoria.show')->with('c', $categoria);
    }

    public function destroy($id) {

        $categoria = $this->categoria->find($id);

        $delete = $categoria->delete();

        if ($delete) {

            return redirect()
                            ->action('CategoriaController@listar')
                            ->with(['sucess' => 'Cadastro Excluido com sucesso']);
        } else {
            return redirect()
                            ->route('CategoriaController@listar', ['id' => $id])
                            ->withErrors(['errors' => 'Falha ao deletar']);
        }
    }

}
