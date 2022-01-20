<?php

namespace Domain\Admin\Http\Resources\Student;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentForFormResource extends JsonResource
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
      'id' => $this->id,
      'name' => $this->name,
      'email' => $this->email,
      'role' => $this->getRoles()->first(),
    ];
  }
}
