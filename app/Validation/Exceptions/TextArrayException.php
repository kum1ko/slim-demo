<?php
    
    namespace App\Validation\Exceptions;
    
    
    use Respect\Validation\Exceptions\ValidationException;
    
    /**
     *
     */
    class TextArrayException extends ValidationException
    {
        
        public static $defaultTemplates = [
            self::MODE_DEFAULT  => [
                self::STANDARD => '{{name}} is not a legal id or comma separated',
            ],
            self::MODE_NEGATIVE => [
                self::STANDARD => '{{name}} is not already taken',
            ]
        ];
    }