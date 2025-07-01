<?php

namespace App\DataObjects;
use Carbon\Carbon;

class Projects {

    public function __construct(
        public string $name = '',
        public ?Carbon $startDate = null,
        public ?Carbon $endDate = null,
        public string $description = '',
        public array $highlights = []
    ){
    }

    public static function fromArray(Array $data): self{

        $startDate = isset($data['projects']['startDate']) ? Carbon::parse : NULL;
        $endDate = isset($data['projects']['endDate']) ? Carbon::parse : NULL;

        return new self (
            name : $data['projects']['date'],
            startDate : $data['projects']['startDate'],
            endDate : $data['projects']['endDate'],
            description : $data['projects']['description'],
            highlights : $data['projects']['highlights']
        );}
}
