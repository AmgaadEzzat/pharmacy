<?php

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

const PAGINATION_COUNT = 15;

function getCurrentLanguage(): string
{
    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}

function getAllLocale(): array
{
    $currentLocale = LaravelLocalization::getCurrentLocale();
    $availableLocales = LaravelLocalization::getSupportedLocales();
    unset($availableLocales[$currentLocale]);

    return $availableLocales;
}

