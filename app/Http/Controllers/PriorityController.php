<?php
/**
 * Created by PhpStorm.
 * User: Nzuki Mtshazi
 * Date: 04-Sep-22
 * Time: 3:54 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Priority;
use Illuminate\Support\Facades\Redirect;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priorities = Priority::where('id', '>', 0)->get();
        return view('priority.index', ['priorities' => $priorities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('priority.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $priority = Priority::where('description', '=', $request->priority_id)->count();
        if ($priority > 0)
            return redirect('priority/add')->withInput()->with('danger', 'Priority already exists');

        $input = $request->all();
        $priority = new Priority($input);

        if ($priority->save()) {
            return Redirect::route('priorities')->with('success', 'Successfully added priority!');
        }
        else
            return Redirect::route('addPriority')->withInput()->withErrors($priority->errors());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $priority = Priority::find($id);
        return view('priority.edit', ['priority' => $priority]);
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
        $priority = Priority::find($id);

        $priority_check = Priority::where('description', '=', $request->description)->first();

        if ($priority_check && $priority_check->id != $id)
            return Redirect::route('editPriority', [$id])->withInput()->with('danger', 'Priority already exists');

        $priority->description = $request->description;

        if ($priority->update())
            return Redirect::route('priorities')->with('success', 'Successfully updated priority!');
        else
            return Redirect::route('editPriority', [$id])->withInput()->withErrors($priority->errors());
    }

}