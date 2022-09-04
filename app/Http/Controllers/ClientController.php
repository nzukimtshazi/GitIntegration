<?php
/**
 * Created by PhpStorm.
 * User: Nzuki Mtshazi
 * Date: 04-Sep-22
 * Time: 4:05 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::where('id', '>', 0)->get();
        return view('client.index', ['clients' => $clients]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('client.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = Client::where('name', '=', $request->client_id)->count();
        if ($client > 0)
            return redirect('client/add')->withInput()->with('danger', 'Client already exists');

        $input = $request->all();
        $client = new Client($input);

        if ($client->save()) {
            return Redirect::route('clients')->with('success', 'Successfully added client!');
        }
        else
            return Redirect::route('addClient')->withInput()->withErrors($client->errors());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('client.edit', ['client' => $client]);
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
        $client = Client::find($id);

        $client_check = Client::where('name', '=', $request->name)->first();

        if ($client_check && $client_check->id != $id)
            return Redirect::route('editClient', [$id])->withInput()->with('danger', 'Client already exists');

        $client->name = $request->name;

        if ($client->update())
            return Redirect::route('clients')->with('success', 'Successfully updated client!');
        else
            return Redirect::route('editClient', [$id])->withInput()->withErrors($client->errors());
    }
}