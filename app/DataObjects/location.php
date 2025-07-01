<?php

namespace App\DataObjects;

class Location {

    public function __construct(
        public string $address,
        public string $postalCode,
        public string $city,
        public string $countryCode,
        public string $region
    ){
    }

    public static function fromArray(Array $data): self{
        return new self (
            address : $data['basics']['location']['address'],
            postalCode : $data['basics']['location']['postalCode'],
            city : $data['basics']['location']['city'],
            countryCode : $data['basics']['location']['countryCode'],
            region  : $data['basics']['location']['region']
        );}
}
