<?php

namespace App\service;

use App\Models\InvitationCode;
use Illuminate\Support\Str;


class InvitationCodeService
{

    static function generateCode(int $amount): array
    {
        $codes = [];
        while (count($codes) < $amount) {
            do {
                $code = Str::upper(Str::random(4) . '-' . rand(1000, 9999) . '-' . Str::random(4));
            } while (InvitationCode::query()->where('code', $code)->exists());
            $codes[] = $code;
        }
        return $codes;
    }


}
