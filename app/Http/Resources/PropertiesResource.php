<?php

namespace App\Http\Resources;

use App\Models\Broker;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertiesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $broker = Broker::find($this->broker_id);
        return [
            'id' => (string) $this->id,
            'attributes' => [
                'address' => $this->address,
                'city' => $this->city,
                'zip_code' => $this->zip_code,
                'listing_type' => $this->listing_type,
                'description' => $this->description,
                'build_year' => $this->build_year,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at

            ],
            'characteristics' => [
                new CharacteristicsResource($this->characteristic)
            ],
            'broker' => [
                'name' => $broker->name,
                'address' => $broker->address,
                'city' => $broker->city,
                'zip_code' => $broker->zip_code,
                'phone_number' => $broker->phone_number

            ]

        ];
    }
}
