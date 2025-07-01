<?php

namespace App\DataObjects;

class Social {

    public function __construct(
        public string $network = '',
        public string $username = '',
        public string $url = '',
    ){
    }

    public static function fromArray(Array $data): self{
        return new self (
            network : $data['profiles']['network'],
            username : $data['profiles']['username'],
            url : $data['profiles']['url']
        );}
}
