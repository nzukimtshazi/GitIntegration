<?php
/**
 * Created by PhpStorm.
 * User: Nzuki Mtshazi
 * Date: 04-Sep-22
 * Time: 4:12 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Facades\Redirect;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::where('id', '>', 0)->get();
        return view('type.index', ['types' => $types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('type.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = Type::where('description', '=', $request->type_id)->count();
        if ($type > 0)
            return redirect('type/add')->withInput()->with('danger', 'Type already exists');

        $input = $request->all();
        $type = new Type($input);

        if ($type->save()) {
            return Redirect::route('types')->with('success', 'Successfully added type!');
        }
        else
            return Redirect::route('addType')->withInput()->withErrors($type->errors());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::find($id);
        return view('type.edit', ['type' => $type]);
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
        $type = Type::find($id);

        $type_check = Type::where('description', '=', $request->description)->first();

        if ($type_check && $type_check->id != $id)
            return Redirect::route('editType', [$id])->withInput()->with('danger', 'Type already exists');

        $type->description = $request->description;

        if ($type->update())
            return Redirect::route('types')->with('success', 'Successfully updated type!');
        else
            return Redirect::route('editType', [$id])->withInput()->withErrors($type->errors());
    }

}