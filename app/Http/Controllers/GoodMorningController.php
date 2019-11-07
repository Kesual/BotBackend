<?php

namespace App\Http\Controllers;

use App\Entities\GoodMorning;
use App\Repositories\GoodMorningRepository as repo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GoodMorningController extends Controller
{
    private $repo;

    public function __construct(repo $repo) {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *
     * maybe later \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = $request->input('data');
        $newMsg = new GoodMorning();
        $newMsg->setMessage($content);
        $this->repo->create($newMsg);

        return  $array = [['value' => $request->input('data')]];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
