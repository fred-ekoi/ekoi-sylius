<?php

namespace App\Service;

use Sylius\Component\Locale\Provider\CachedLocaleCollectionProvider as LocaleCollectionProvider;

class LocaleService
{
    private $localeCollectionProvider;

    public function __construct(LocaleCollectionProvider $localeCollectionProvider)
    {
        $this->localeCollectionProvider = $localeCollectionProvider;
    }

    public function getLocaleByCode(string $code)
    {
        $locales = $this->localeCollectionProvider->getAll();
        return array_key_exists($code, $locales) ? $locales[$code] : null;
    }
}
