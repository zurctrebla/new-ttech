<?php

namespace App\Http\Controllers\Api;

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
        return GameResource::collection($games);
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
        return new GameResource($game);
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
        return new GameResource($game);
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
        return response()->json(['message' => 'updated']);
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
        return response()->json([], 204);
    }
}
