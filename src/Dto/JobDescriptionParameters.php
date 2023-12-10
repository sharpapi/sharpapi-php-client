<?php

declare(strict_types=1);

namespace SharpAPI\SharpApiService\Dto;


class JobDescriptionParameters
{
    public function __construct(
        public string  $name,
        public ?string $company_name,
        public ?string $minimum_work_experience,
        public ?string $minimum_education,
        public ?string $employment_type,
        public ?array  $required_skills,
        public ?array  $optional_skills,
        public ?string $country,
        public ?bool   $remote,
        public ?bool   $visa_sponsored,
        public ?string $language = 'English',
    )
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'company_name' => $this->company_name,
            'minimum_work_experience' => $this->minimum_work_experience,
            'employment_type' => $this->employment_type,
            'required_skills' => $this->required_skills,
            'optional_skills' => $this->optional_skills,
            'country' => $this->country,
            'remote' => $this->remote,
            'visa_sponsored' => $this->visa_sponsored,
            'language' => $this->language,
        ];
    }
}
