<?php

declare(strict_types=1);

class BankAccountFacade
{
    private int $accountNumber;
    private int $securityCode;

    private AccountNumberCheck $acctChecker;
    private SecurityCodeCheck $codeChecker;
    private FundsCheck $fundChecker;
    
    private WelcomeToBank $bankWelcome;

    public function __construct(int $newAccNum, int $newSecCode)
    {
        $this->accountNumber = $newAccNum;
        $this->securityCode = $newSecCode;

        $this->bankWelcome = new WelcomeToBank();
        $this->acctChecker = new AccountNumberCheck();
        $this->codeChecker = new SecurityCodeCheck();
        $this->fundChecker = new FundsCheck();
    }

    public function getAccountNumber(): int
    {
        return $this->accountNumber;
    }

    public function getSecurityCode(): int
    {
        return $this->securityCode;
    }

    public function withdrawCash(float $cashToGet): void
    {
        if($this->acctChecker->accountActive($this->getAccountNumber()) && 
           $this->codeChecker->isCodeCorrect($this->getSecurityCode()) && 
           $this->fundChecker->haveEnoughMoney($cashToGet)) {
            echo "Transaction Complete\n\n";
      } else {
            echo "Transaction Failed\n\n";
        }
    }

    public function depositCash(float $cashToDeposit): void
    {
        if(($this->acctChecker->accountActive($this->getAccountNumber()) && 
           $this->codeChecker->isCodeCorrect($this->getSecurityCode())) |
           $this->fundChecker->makeDeposit($cashToDeposit)) {
            echo "Transaction Complete\n\n";
      } else {
            echo "Transaction Failed\n\n";
        }
    }
}