<?php

namespace App\Enum;

enum BlockType: string
{
    case TEXT = 'text';
    case IMAGE = 'image';
    case LAYOUT = 'layout';
    case VIDEO = 'video';
    
    public function label(): string
    {
        return match($this) {
            self::TEXT => 'app.ui.label.text',
            self::IMAGE => 'app.ui.label.image',
            self::LAYOUT => 'app.ui.label.layout',
            self::VIDEO => 'app.ui.label.video',
        };
    }
}
