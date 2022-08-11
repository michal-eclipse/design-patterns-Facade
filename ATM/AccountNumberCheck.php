<?php

declare(strict_types=1);

class AccountNumberCheck
{
    private int $accountNumber = 12345678;

    public function getAccountNumber(): int
    {
        return $this->accountNumber;
    }

    public function accountActive(int $accNumToCheck): bool
    {
        return $accNumToCheck == $this->getAccountNumber();
    }
}