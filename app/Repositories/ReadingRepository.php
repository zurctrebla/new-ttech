<?php

namespace App\Repositories;

use App\Models\Reading;

class ReadingRepository
{
    protected $entity;

    public function __construct(Reading $reading)
    {
        $this->entity = $reading;
    }

    public function getAllReadings()
    {
        return $this->entity->get();
    }

    public function createNewReading(array $data)
    {
        return $this->entity->create($data);
    }

    public function getReadingByUuid(string $identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrFail();
    }

    public function deleteReadingByUuid(string $identify)
    {
        $reading = $this->getReadingByUuid($identify, false);

        return $reading->delete();
    }

    public function updateReadingByUuid(string $identify, array $data)
    {
        $reading = $this->getReadingByUuid($identify, false);

        return $reading->update($data);
    }
}
