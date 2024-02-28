<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.type.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        // RECUPERO I DATI DELLA RICHIESTA
        $form_data = $request->all();

        $type = new Type;

        // DEFINISCO LO SLUG
        $slug = Str::slug($form_data['name'], '-');

        // DO IL VALORE DELLO SLUG DEFINITO ALLA RICHIESTA
        $form_data['slug'] = $slug;

        // USO IL FILL PER RIEMPIRE I CAMPI
        $type->fill($form_data);

        // SALVO LA NUOVA ISTANZA
        $type->save();

        // FACCIO UN REDIRECT ALLA PAGINA PRINCIPALE DI TYPES
        return redirect()->route('admin.types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.type.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $form_data = $request->all();

        // CONTROLLO PER VERIFICARE CHE IL 'name' SIA UNIQUE O NO
        $exists = Type::where('name', 'LIKE', $form_data['name'])->where('id', '!=', $type->id)->get();
        if (count($exists) > 0) {
            $error_message = 'The type name already exist!';
            return redirect()->route('admin.types.edit', ['type' =>  $type->slug], compact('error_message'));
        }

        // DEFINISCO LO SLUG
        $slug = Str::slug($form_data['name'], '-');

        // DO IL VALORE DELLO SLUG DEFINITO ALLA RICHIESTA
        $form_data['slug'] = $slug;

        // USO IL Update PER RIEMPIRE I CAMPI
        $type->update($form_data);

        // FACCIO UN REDIRECT ALLA PAGINA PRINCIPALE DI TYPES
        return redirect()->route('admin.types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index');
    }
}
