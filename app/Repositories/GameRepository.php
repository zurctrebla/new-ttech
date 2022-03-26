<?php

namespace App\Repositories;

use App\Models\Game;

class GameRepository
{
    protected $entity;

    public function __construct(Game $game)
    {
        $this->entity = $game;
    }

    public function getAllGames()
    {
        return $this->entity->get();
    }

    public function createNewGame(array $data)
    {
        return $this->entity->create($data);
    }

    public function getGameByUuid(string $identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrFail();
    }

    public function deleteGameByUuid(string $identify)
    {
        $game = $this->getGameByUuid($identify, false);

        return $game->delete();
    }

    public function updateGameByUuid(string $identify, array $data)
    {
        $game = $this->getGameByUuid($identify, false);

        return $game->update($data);
    }
}
