<?php

namespace App\DataObjects;
use Carbon\Carbon;

class Work {

    public function __construct(
        public string $name,
        public string $ocupation,
        public string $url,
        public string $startDate,
        public string $endDate,
        public string $summary,
        public array $highlights
    ){
    }

    public static function fromArray(Array $data): self{

        $startDate = isset($data['projects']['startDate']) ? Carbon::parse : NULL;
        $endDate = isset($data['projects']['endDate']) ? Carbon::parse : NULL;

        return new self (
            name : $data['work']['name'],
            ocupation : $data['work']['ucupation'],
            url : $data['work']['url'],
            startDate : $data['work']['startDate'],
            endDate : $data['work']['endDate'],
            summary : $data['work']['summary'],
            highlights : $data['work']['highlights'],
        );}
}
