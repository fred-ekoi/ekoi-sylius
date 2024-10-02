<?php

namespace App\DTO\Translation;

class AutoTranslationBodyDTO
{
    /**
     * @var string[] $targetLocales
     * The locales to which the text should be translated
     */
    protected array $targetLocales = [];

    /**
     * @var AutoTranslationBodyDataDTO[] $data
     * The data to be translated.
     * Each element of the array is an instance of AutoTranslationBodyDataDTO
     */
    protected array $data = [];

    /**
     * @param array $targetLocales
     * @param array $data
     */
    public function __construct(array $targetLocales, array $data)
    {
        $this->targetLocales = $targetLocales;
        $this->data = $data;
    }

    /**
     * @return string[]
     */
    public function getTargetLocales(): array
    {
        return $this->targetLocales;
    }

    /**
     * @return AutoTranslationBodyDataDTO[]
     */
    public function getData(): array
    {
        return $this->data;
    }
}
