<?php

declare(strict_types=1);

class FundsCheck
{
    private float $cashInAccount;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->cashInAccount = 1000.00;
    }

    public function getCashInAccount(): float
    {
        return $this->cashInAccount;
    }

    public function setCashInAccount(float $cashInAccount): void
    {
        $this->cashInAccount = $cashInAccount;
    }

    public function decreaseCashInAccount(float $cashWithdrawn): void
    {
        $this->setCashInAccount($this->getCashInAccount()-$cashWithdrawn); 
    }

    public function increaseCashInAccount(float $cashDeposited): void
    {
        $this->setCashInAccount($this->getCashInAccount() + $cashDeposited);
    }

    public function haveEnoughMoney(float $cashToWithdrawal): bool
    {
        if ($this->getCashInAccount() < $cashToWithdrawal) {
            echo "Error: You don't have enough money\n";
            echo "Current Balance: ". $this->getCashInAccount(). "\n";

            return false;
        } else {
            $this->decreaseCashInAccount($cashToWithdrawal);
            echo "Withdrawal Complete: Current Balance is ". $this->getCashInAccount() ."\n";
        }

        return true;
    }

    public function makeDeposit(float $cashToDeposit): void
    {
        $this->increaseCashInAccount($cashToDeposit);
        echo "Deposit Complete: Current Balance is ". $this->getCashInAccount(). "\n";
    }
}