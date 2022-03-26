<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateGame;
use App\Http\Resources\GameResource;
use App\Services\GameService;

class GameController extends Controller
{
    protected $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = $this->gameService->getGames();
        $games = GameResource::collection($games);
        return view('admin.pages.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateGame $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateGame $request)
    {
        $game = $this->gameService->createNewGame($request->validated());
        return redirect()->route('games.index')->with('message', 'Jogo criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $game = $this->gameService->getGame($identify);
        $game = new GameResource($game);
        return view('admin.pages.games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function edit($identify)
    {
        $game = $this->gameService->getGame($identify);
        $game = new GameResource($game);
        return view('admin.pages.games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateGame $request
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateGame $request, $identify)
    {
        $this->gameService->updateGame($identify, $request->validated());
        return redirect()->route('games.index')->with('message', 'Jogo editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy($identify)
    {
        $this->gameService->deleteGame($identify);
        return redirect()->route('games.index')->with('message', 'Jogo deletado com sucesso');
    }
}
