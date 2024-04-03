<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'assetName' => $this->assetName,
            'serialNumber' => $this->serialNumber,
            'isActive' => $this->isActive,
            'lastMaintenance' => $this->lastMaintenance,
        ];
    }
}
