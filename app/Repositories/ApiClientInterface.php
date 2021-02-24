<?php

namespace App\Repositories;

interface ApiClientInterface {
    public function get(string $endpoint);
}
