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
use Illuminate\Support\Facades\Redirect;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repInfo = Repository::where('id', '>', 0)->get();
        $repositories = array();
        $no = 1;

        foreach ($repInfo as $repo)
        {
            $client = Client::where('id', '=', $repo->client_id)->first();
            $priority = Priority::where('id', '=', $repo->priority_id)->first();
            $type = Type::where('id', '=', $repo->priority_id)->first();

            $repoInfo = new RepoInfo();
            $repoInfo->no = $no++;
            $repoInfo->id = $repo->id;
            $repoInfo->title = $repo->title;
            $repoInfo->description = $repo->description;
            $repoInfo->assigned_to = $repo->assigned_to;
            $repoInfo->status = $repo->status;
            $repoInfo->client = $client->name;
            $repoInfo->priority = $priority->description;
            $repoInfo->type = $type->description;
            array_push($repositories, $repoInfo);
        }

        return view('repository.index', ['repositories' => $repositories]);
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

        $repository = new Repository($input);
        $repository->logo = "None";

        if ($repository->save())
            return Redirect::route('repositories')->with('success', 'Successfully added repository!');
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
        $clients = Client::where('id', '>', 0)->get();
        $client = Client::where('id', '=', $repository->client_id)->first();
        $cid = $client->id;
        $priorities = Priority::where('id', '>', 0)->get();
        $priority = Priority::where('id', '=', $repository->priority_id)->first();
        $pid = $priority->id;
        $types = Type::where('id', '>', 0)->get();
        $type = Type::where('id', '=', $repository->type_id)->first();
        $tid = $type->id;

        return view('repository.edit', (compact('repository', 'clients', 'cid', 'priorities', 'pid', 'types', 'tid')));
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

        $repos_check = Repository::where('client_id', '=', $request->client_id)
            ->where('priority_id', '=', $request->priority_id)
            ->where('type_id', '=', $request->type_id)->first();

        if ($repos_check && $repos_check->id != $id)
            return Redirect::route('editRepository', [$id])->withInput()
                ->with('danger', 'Client for that priority and type already exists');

        $repository->title = $request->title;
        $repository->description = $request->description;
        $repository->assigned_to = $request->assigned_to;
        $repository->status = $request->status;

        if ($repository->update())
            return Redirect::route('repositories')->with('success', 'Successfully updated repository!');
        else
            return Redirect::route('editRepository', [$id])->withInput()->withErrors($repository->errors());
    }

}
class RepoInfo
{
    public $id;
    public $no;
    public $title;
    public $description;
    public $assigned_to;
    public $status;
    public $client;
    public $priority;
    public $type;
}