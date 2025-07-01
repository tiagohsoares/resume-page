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

        $startDate = isset($data['startDate']) ? Carbon::parse : NULL;
        $endDate = isset($data['endDate']) ? Carbon::parse : NULL;

        return new self (
            name : $data['date'],
            startDate : $data['startDate'],
            endDate : $data['endDate'],
            description : $data['description'],
            highlights : $data['highlights']
        );}
}
