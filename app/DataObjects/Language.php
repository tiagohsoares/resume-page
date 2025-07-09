<?php

namespace App\DataObjects;

readonly class Language {

    public function __construct(
        public string $language,
        public string $fluency
    ){
    }

    public static function fromArray(Array $data): self{
        return new self (
            language : $data['language'],
            fluency : $data['fluency']
        );}
}
