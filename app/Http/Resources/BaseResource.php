<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    protected $code, $message, $vldr, $data;

    public function __construct(int $code = 200, string $message = "", $validator = null, $data = null)
    {
        $this->code     = $code;
        $this->message  = $message;
        $this->vldr     = $validator;
        $this->data     = $data;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'message'   => $this->message,
            'validators'    => $this->vldr,
            'data'      => $this->data,
        ];
    }
}
