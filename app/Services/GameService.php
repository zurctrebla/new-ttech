<?php

namespace App\Services;

use App\Repositories\GameRepository;

class GameService
{
    protected $repository;

    public function __construct(GameRepository $gameRepository)
    {
        $this->repository = $gameRepository;
    }

    public function getGames()
    {
        return $this->repository->getAllGames();
    }

    public function createNewGame(array $data)
    {
        return $this->repository->createNewGame($data);
    }

    public function getGame(string $identify)
    {
        return $this->repository->getGameByUuid($identify);
    }

    public function deleteGame(string $identify)
    {
        return $this->repository->deleteGameByUuid($identify);
    }

    public function updateGame(string $identify, array $data)
    {
        return $this->repository->updateGameByUuid($identify, $data);
    }
}
