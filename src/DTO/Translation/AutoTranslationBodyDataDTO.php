<?php

namespace App\DTO\Translation;

class AutoTranslationBodyDataDTO
{
    /**
     * @var string $locale
     * The locale corresponding to the current value
     */
    public string $locale;

    /**
     * @var string $name
     * The name corresponding to the input for the current value
     */
    public string $name;

    /**
     * @var string $value
     * The value (text)
     */
    public string $value;

    /**
     * @param string $locale
     * @param string $name
     * @param string $value
     */
    public function __construct(string $locale, string $name, string $value)
    {
        $this->locale = $locale;
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
