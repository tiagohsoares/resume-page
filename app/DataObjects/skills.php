<?php

namespace App\DataObjects;

class Skills {

    public function __construct(
        public string $name = '',
        public string $level = '',
        public array $keywords = [],
    ){
    }

    public static function fromArray(Array $data): self{
        return new self (
            name : $data['skills']['name'],
            level : $data['skills']['level'],
            keywords : $data['skills']['keywords']
        );}
}
