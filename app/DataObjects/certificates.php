<?php

namespace App\DataObjects;

class Certificates {

    public function __construct(
        public string $name = '',
        public string $date = '',
        public string $issuer = '',
        public string $url = ''
    ){
    }

    public static function fromArray (Array $data) : self{
        return new self (
            name : $data['certificates']['name'] ?? '',
            date : $data['certificates']['date'] ?? '',
            issuer : $data['certificates']['issuer'] ?? '',
            url : $data['certificates']['url'] ?? ''
        );
    }
}