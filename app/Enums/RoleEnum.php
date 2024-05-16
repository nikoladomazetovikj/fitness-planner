<?php

namespace App\Enums;

enum RoleEnum: int
{
    case MEMBER = 1;
    case COACH = 2;

    public function list(): RoleEnum
    {
        return match ($this) {
            self::MEMBER => self::MEMBER,
            self::COACH => self::COACH,
        };
    }
}
