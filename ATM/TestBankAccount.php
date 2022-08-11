<?php

declare(strict_types=1);

/**
 * @TODO implement Autoloader
 */
include_once('AccountNumberCheck.php');
include_once('SecurityCodeCheck.php');
include_once('WelcomeToBank.php');
include_once('FundsCheck.php');

include_once('BankAccountFacade.php');

class TestBankAccount
{
    private static BankAccountFacade $accessingBank;

    public static function launchSimulation(): void
    {
        self::$accessingBank = new BankAccountFacade(12345678, 1234);
        self::$accessingBank->withdrawCash(50.00);
        self::$accessingBank->withdrawCash(900.00);
        self::$accessingBank->depositCash(200.00);
    }
}

TestBankAccount::launchSimulation();