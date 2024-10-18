<?php

namespace App\Enum;

enum BlockAlign: string
{
    case ROW = 'row';
    case COLUMN = 'column';
    
    public function value(): string
    {
        return match($this) {
            self::ROW => 'row',
            self::COLUMN => 'column',
        };
    }
    
    public function label(): string
    {
        return match($this) {
            self::ROW => 'app.ui.label.row',
            self::COLUMN => 'app.ui.label.column',
        };
    }
}
