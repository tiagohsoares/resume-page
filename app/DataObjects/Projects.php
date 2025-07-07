<?php

namespace App\DataObjects;
use Carbon\Carbon;

readonly class Projects {

    public function __construct(
        public string $name = '',
        public ?Carbon $startDate = null,
        public ?Carbon $endDate = null,
        public string $description = '',
        public array $highlights = [],
        public string $url = ''
    ){
    }

    public static function fromArray(Array $data): self{

        $startDate = isset($data['startDate']) ? Carbon::parse($data['startDate']) : NULL;
        $endDate = isset($data['endDate']) ? Carbon::parse($data['endDate']) : NULL;

        return new self (
            name : $data['name'],
            startDate : $startDate,
            endDate : $endDate,
            description : $data['description'],
            highlights : $data['highlights'],
            url: $data['url']
        );}
}
