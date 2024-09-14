<?php

namespace App\Commands;

use App\Models\FreelanceProfessional;

class UpdateFreelanceProfessional
{
    protected $data;
    protected $professional;

    public function __construct(FreelanceProfessional $professional, array $data)
    {
        $this->professional = $professional;
        $this->data = $data;
    }

    public function execute()
    {
        $this->professional->update($this->data);
    }
}
