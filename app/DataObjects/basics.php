<?php

namespace App\DataObjects;

readonly class Basics {

    public function __construct(
        public string $name,
        public string $label,
        public string $image = '',
        public string $email,
        public string $phone,
        public string $url,
        public string $summary,
        public Location $location = new location(),
        public array $profiles = []
    ){}

public static function fromArray(Array $data): self{

    $location = isset($data['basics']['location']) ? Location::fromArray($data) : new location();
    $profiles[] = Social::fromArray($data);

    return new self (
        name : $data['basics']['name'],
        label : $data['basics']['label'],
        image : $data['basics']['image'],
        email : $data['basics']['email'],
        phone  : $data['basics']['phone'],
        url : $data['basics']['url'],
        summary : $data['basics']['summary'],
        location :   $data['basics']['location'],
        profiles :   $data['basics']['profiles']
    );}
}

