<?php

namespace App\DataObjects;

class Skill {

    public function __construct(
        public string $name = '',
        public string $level = '',
        public array $keywords = [],
    ){
    }

    public static function fromArray(Array $data): self{
        return new self (
            name : $data['name'],
            level : $data['level'],
            keywords : $data['keywords']
        );}
}
