<?php

namespace App\Services;

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class LogIn
{
    protected RemoteWebDriver $driver;
    protected string $logInPageUrl;

    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
        $this->logInPageUrl = env('LOG_IN_PAGE_URL');
    }

    public function login(string $userName, string $password) :void
    {
        $this->driver->get($this->logInPageUrl);

        $this->driver->findElement(WebDriverBy::className('css-2gs0sc'))
            ->sendKeys($userName);
        $this->driver->findElement(WebDriverBy::className('css-ugcges'))
            ->sendKeys($password);
        $this->driver->findElement(WebDriverBy::className('css-ypypxs'))
            ->click();
    }
}
