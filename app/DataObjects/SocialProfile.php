<?php

namespace App\DataObjects;

class SocialProfile {

    public function __construct(
        public string $network = '',
        public string $username = '',
        public string $url = '',
    ){
    }

    public static function fromArray(Array $data): self{
        return new self (
            network : $data['network'],
            username : $data['username'],
            url : $data['url']
        );}
}
