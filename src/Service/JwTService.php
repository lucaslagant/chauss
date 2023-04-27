<?php

namespace App\Service;

use DateTimeImmutable;

class JWTService
{
    //On génère le token

    public function generate(array $header, array $payload, string $secret, int $validity = 10800): string
    {
        if ($validity <= 0) {
            return "";
        }

        $now = new DateTimeImmutable();
        $exp = $now->getTimestamp() + $validity;

        $payload['iat'] = $now->getTimestamp();
        $payload['exp'] = $exp;


        return $jwt;
    }
}