<?php

namespace App\Entity\TranslationOverrideDictionary;

use App\Entity\Locale\Locale;
use App\Repository\TranslationOverrideDictionary\TranslationOverrideDictionaryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TranslationOverrideDictionaryRepository::class)]
class TranslationOverrideDictionary
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Locale $keyLocale = null;

    #[ORM\Column(length: 255)]
    private ?string $keyText = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Locale $valueLocale = null;

    #[ORM\Column(length: 255)]
    private ?string $valueText = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKeyLocale(): ?Locale
    {
        return $this->keyLocale;
    }

    public function setKeyLocale(?Locale $keyLocale): static
    {
        $this->keyLocale = $keyLocale;

        return $this;
    }

    public function getKeyText(): ?string
    {
        return $this->keyText;
    }

    public function setKeyText(string $keyText): static
    {
        $this->keyText = $keyText;

        return $this;
    }

    public function getValueLocale(): ?Locale
    {
        return $this->valueLocale;
    }

    public function setValueLocale(?Locale $valueLocale): static
    {
        $this->valueLocale = $valueLocale;

        return $this;
    }

    public function getValueText(): ?string
    {
        return $this->valueText;
    }

    public function setValueText(string $valueText): static
    {
        $this->valueText = $valueText;

        return $this;
    }
}
