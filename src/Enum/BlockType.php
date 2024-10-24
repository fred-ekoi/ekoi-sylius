<?php

namespace App\Enum;

enum BlockType: string
{
    case TEXT = 'text';
    case IMAGE = 'image';
    case LAYOUT = 'layout';
    case VIDEO = 'video';
    case TITLE = 'title';
    
    public function label(): string
    {
        return match($this) {
            self::TEXT => 'app.ui.label.text',
            self::IMAGE => 'app.ui.label.image',
            self::LAYOUT => 'app.ui.label.layout',
            self::VIDEO => 'app.ui.label.video',
            self::TITLE => 'app.ui.label.title',
        };
    }

    static public function getAvailableTypes(): array
    {
        return [
            self::TEXT,
            self::IMAGE,
            self::LAYOUT,
            self::VIDEO,
            self::TITLE,
        ];
    }
}
