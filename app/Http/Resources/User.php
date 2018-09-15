<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
           'name' => $this->firstname. ' '.$this->lastname,
            'email' => $this->email,
            'verified' => $this->status,
            'user_since' => $this->created_at
        ];
    }
}
