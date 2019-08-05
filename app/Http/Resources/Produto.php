<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Produto extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function with($request){
        return [
            'version' =>env('APP_VERSION', '1.0.0'),
            'author' => 'Mateus Costa',
            'author_url' => url(env('APP_AUTHOR_URL', 'https:\/\/github.com\/MateusCosta'))
        ];
    }
}
