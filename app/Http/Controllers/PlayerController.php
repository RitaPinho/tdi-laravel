<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Player::with('team')->get();
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
            'age' => 'required|integer|max:2',
            'position' => 'required|string|max:100',
            'team_id' => 'required|integer|exists:teams,id'
        ], [
            'name.required' => 'Insira o nome',
            'name.string' => 'Nome inválido, insira uma string',
            'name.max' => 'Nome demasiado longo',
            'name.unique' => 'Nome repetido',
            'age.required' => 'Insira a idade',
            'age.integer' => 'Idade inválida, insira um número',
            'age.max' => 'Idade demasiado longa',
            'position.max' => 'Posição demasiado longa',
            'position.required' => 'Insira uma posição',
            'position.string' => 'Posição inválida, insira uma stirng',
            'team_id.required' => 'Insira um clube',
            'team_id.integer' => 'Clube inválido, insira um número',
            'team_id.exists' => 'Id de clube inexistente',
        ]);

        if ($validator->fails())
            return $validator->errors()->all();

        /*$player = Player::create(
        [
            'name' => $data['name'],
            'age' => $data['age'],
            'position' => $data['position'],
            'team_id' => $data['team_id']
        ]
        );*/

        $player = Player::create($data);
        return $player;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
        return $player;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:100',
            'age' => 'required|integer|max:2',
            'position' => 'required|string|max:100',
            'team_id' => 'required|integer|exists:teams,id'
        ], [
            'name.required' => 'Insira o nome',
            'name.string' => 'Nome inválido, insira uma string',
            'name.max' => 'Nome demasiado longo',
            'name.unique' => 'Nome repetido',
            'age.required' => 'Insira a idade',
            'age.integer' => 'Idade inválida, insira um número',
            'age.max' => 'Idade demasiado longa',
            'position.max' => 'Posição demasiado longa',
            'position.required' => 'Insira uma posição',
            'position.string' => 'Posição inválida, insira uma stirng',
            'team_id.required' => 'Insira um clube',
            'team_id.integer' => 'Clube inválido, insira um número',
            'team_id.exists' => 'Id de clube inexistente',
        ]);

        if ($validator->fails())
            return $validator->errors()->all();

        $player->update($data);

        return $player;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
        $player->delete();

        return 'deleted';
    }
}
