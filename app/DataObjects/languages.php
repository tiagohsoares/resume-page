<?php

namespace App\DataObjects;

class Languages {

    public function __construct(
        public string $language,
        public string $fluency
    ){
    }

    public static function fromArray(Array $data): self{
        return new self (
            language : $data['languages']['langauage'],
            fluency : $data['languages']['fluency']
        );}
}
