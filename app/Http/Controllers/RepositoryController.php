<?php
/**
 * Created by PhpStorm.
 * User: Nzuki Mtshazi
 * Date: 01-Sep-22
 * Time: 9:23 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Priority;
use App\Models\Repository;
use App\Models\Type;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repositories = Repository::where('id', '>', 0)->get();
        return view('repository.index', compact('repositories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $clients = Client::where('id', '>', 0)->get();
        $priorities = Priority::where('id', '>', 0)->get();
        $types = Type::where('id', '>', 0)->get();
        return view('repository.add', compact('clients', 'priorities', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        dd($request->client_id);

        $client = Client::where('name', '=', $request->client_id)->count();
        if ($client > 0)
            return redirect('repository/add')->withInput()->with('danger', 'Client already exists');
        else
            $client = new Client($input);

        $priority = Priority::where('description', '=', $request->priority_id)->count();
        if ($priority > 0)
            return redirect('repository/add')->withInput()->with('danger', 'Priority already exists');
        else
            $priority = new Priority($input);

        $type = Type::where('description', '=', $request->type_id)->count();
        if ($type > 0)
            return redirect('repository/add')->withInput()->with('danger', 'Type already exists');
        else
            $type = new Type($request->type_id);

        $repository = new Repository($input);
        $repository->client = $request->client_id;
        $repository->priority = $request->priority_id;
        $repository->type = $request->type_id;

        if ($repository->save()) {
            $client->save();
            $priority->save();
            $type->save();
            return Redirect::route('repository')->with('success', 'Successfully added repository!');
        }
        else
            return Redirect::route('addRepository')->withInput()->withErrors($repository->errors());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repository = Repository::find($id);
        return view('repository.edit', ['repository' => $repository]);
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
        $repository = Repository::find($id);

        //$product_check = Product::where('name', '=', $request->name)->first();

        //if ($product_check && $product_check->id != $id)
        //    return Redirect::route('editProduct', [$id])->withInput()->with('danger', 'Product already exists');

        //$product->name = $request->name;

        if ($repository->update())
            return Redirect::route('repositories')->with('success', 'Successfully updated repository!');
        else
            return Redirect::route('editRepository', [$id])->withInput()->withErrors($repository->errors());
    }

}