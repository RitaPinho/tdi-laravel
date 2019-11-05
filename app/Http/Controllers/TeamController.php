<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Team::all();
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:100',
            'division' => 'required|integer|max:1',
            'country' => 'required|string|max:100'
        ], [
            'name.required' => 'Insira o nome',
            'name.string' => 'Nome inválido, insira uma string',
            'name.max' => 'Nome demasiado longo',
            'name.unique' => 'Nome repetido',
            'division.required' => 'Insira a divisão',
            'division.integer' => 'Divisão inválida, insira um número',
            'division.max' => 'Divisão demasiado longa',
            'country.max' => 'País demasiado longo',
            'country.required' => 'Insira um país',
            'country.string' => 'País inválido, insira uma stirng'
        ]);

        if ($validator->fails())
            return $validator->errors()->all();

        //return $data['name'];
        /*
        $team = Team::create(
            [
                'name' => $data['name'],
                'division' => $data['division'],
                'country' => $data['country']
            ]
        );*/
        $team = Team::create($data);

        return $team;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
        return $team;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:100',
            'division' => 'required|integer|max:1',
            'country' => 'required|string|max:100'
        ], [
            'name.required' => 'Insira o nome',
            'name.string' => 'Nome inválido, insira uma string',
            'name.max' => 'Nome demasiado longo',
            'name.unique' => 'Nome repetido',
            'division.required' => 'Insira a divisão',
            'division.integer' => 'Divisão inválida, insira um número',
            'division.max' => 'Divisão demasiado longa',
            'country.max' => 'País demasiado longo',
            'country.required' => 'Insira um país',
            'country.string' => 'País inválido, insira uma stirng'
        ]);

        if ($validator->fails())
            return $validator->errors()->all();

        $team->update($data);

        return $team;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
        $team->delete();

        return 'deleted';
    }
}
