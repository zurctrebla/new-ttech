<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class LocatorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'locator' => $this->locator,
        //     'serial' => $this->serial,
        //     'serial' => $this->serial,
        //     'serial' => $this->serial,
        //     'serial' => $this->serial,
        //     'serial' => $this->serial,
        //     'created_at' => Carbon::make($this->created_at)->format('d/m/Y'),
        // ];
    }
}
