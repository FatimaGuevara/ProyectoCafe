<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\categoria;
use Illuminate\Http\Request;

class categoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $categorias = categoria::where('nombre', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $categorias = categoria::latest()->paginate($perPage);
        }

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->except('_token');
        
        categoria::create($requestData);

        return redirect('categorias')->with('flash_message', 'categoria agregada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */

    public function show($id)
    {
        $categoria = categoria::findOrFail($id);

        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $categoria = categoria::findOrFail($id);

        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $categoria = categoria::findOrFail($id);
        $categoria->update($requestData);

        return redirect('categorias')->with('flash_message', 'categoria actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        categoria::destroy($id);

        return redirect('categorias')->with('flash_message', 'categoria eliminada!');
    }
}
