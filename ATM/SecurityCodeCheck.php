<?php

declare(strict_types=1);

class SecurityCodeCheck
{
    private int $securityCode = 1234;

    public function getSecurityCode(): int
    {
        return $this->securityCode;
    }

    public function isCodeCorrect(int $secCodeToCheck): bool
    {
        return $secCodeToCheck == $this->getSecurityCode();
    }
}