<?php

namespace App\Services;

use App\Repositories\LocatorRepository;
use App\Repositories\ReadingRepository;

class ReadingService
{
    protected $repository;

    public function __construct(
        LocatorRepository $locatorRepository,
        ReadingRepository $readingRepository)
    {
        $this->readingRepository = $readingRepository;
        $this->locatorRepository = $locatorRepository;
    }

    public function getReadings()
    {
        return $this->readingRepository->getAllReadings();
    }

    public function createNewReading(array $data)
    {
        $locator = $this->locatorRepository->getLocatorByUuid($data['locator']);
        $data['locator_id'] = $locator->id;
        return $this->readingRepository->createNewReading($data);
    }

    public function getReading(string $identify)
    {
        return $this->readingRepository->getReadingByUuid($identify);
    }

    public function deleteReading(string $identify)
    {
        return $this->readingRepository->deleteReadingByUuid($identify);
    }

    public function updateReading(string $identify, array $data)
    {
        return $this->readingRepository->updateReadingByUuid($identify, $data);
    }
}
