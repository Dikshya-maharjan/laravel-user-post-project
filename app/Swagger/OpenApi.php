<?php

namespace App\Swagger;
use OpenApi\Attributes as OA;

#[OA\Info(
    version: "1.0.0",
    title: "Practice Laravel API",
    description: "Laravel 12 Swagger Documentation"
)]
#[OA\Server(
    url: "http://127.0.0.1:8000",
    description: "Local Server"
)]
class OpenApi
{
}