<?php

namespace App\DataObjects;
use Carbon\Carbon;

class Education {

    public function __construct(
        public string $instituition,
        public string $url,
        public string $area,
        public string $studytype,
        public ?Carbon $startDate,
        public ?Carbon $endDate,
        public array $courses,
    ){
    }

    public static function fromArray(Array $data): self{

        $startDate = isset($data['projects']['startDate']) ? Carbon::parse : NULL;
        $endDate = isset($data['projects']['endDate']) ? Carbon::parse : NULL;

        return new self (
            instituition : $data['projects']['date'],
            url : $data['projects']['date'],
            area : $data['projects']['date'],
            studyType : $data['projects']['date'],
            startDate : $data['projects']['startDate'],
            endDate : $data['projects']['endDate'],
            courses : $data['projects']['date']
        );}
}
