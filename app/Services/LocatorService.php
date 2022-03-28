<?php

namespace App\Services;

use App\Repositories\{
    ClientRepository,
    GameRepository,
    LocatorRepository,
    PartnerRepository
};

class LocatorService
{
    protected $locatorRepository;

    public function __construct(
        ClientRepository $clientRepository,
        GameRepository $gameRepository,
        LocatorRepository $locatorRepository,
        PartnerRepository $partnerRepository
        )
    {
        $this->clientRepository = $clientRepository;
        $this->gameRepository = $gameRepository;
        $this->locatorRepository = $locatorRepository;
        $this->partnerRepository = $partnerRepository;
    }

    public function getLocators()
    {
        return $this->locatorRepository->getAllLocators();
    }

    public function createNewLocator(array $data)
    {
        $client = $this->clientRepository->getClientByUuid($data['client']);
        $game = $this->gameRepository->getGameByUuid($data['game']);
        $partner = $this->partnerRepository->getPartnerByUuid($data['partner']);
        $data['client_id'] = $client->id;
        $data['game_id'] = $game->id;
        $data['partner_id'] = $partner->id;
        return $this->locatorRepository->createNewLocator($data);
    }

    public function getLocator(string $identify)
    {
        return $this->locatorRepository->getLocatorByUuid($identify);
    }

    public function deleteLocator(string $identify)
    {
        return $this->locatorRepository->deleteLocatorByUuid($identify);
    }

    public function updateLocator(string $identify, array $data)
    {
        return $this->locatorRepository->updateLocatorByUuid($identify, $data);
    }
}
