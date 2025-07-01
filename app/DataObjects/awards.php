<?php

namespace App\DataObjects;

class Awards {

    public function __construct(
        public string $endereco,
        public string $codigoPostal,
        public string $cidade,
        public string $pais,
        public string $estado
    ){
    }

    public static function fromArray(Array $data): self{
        return new self (
            endereco : $data['basics']['location']['address'],
            codigoPostal : $data['basics']['location']['postalCode'],
            cidade : $data['basics']['location']['city'],
            pais : $data['basics']['location']['countryCode'],
            estado  : $data['basics']['location']['region']
        );}
}
