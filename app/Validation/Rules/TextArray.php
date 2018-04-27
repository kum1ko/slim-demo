<?php
    
    namespace App\Validation\Rules;
    
    use Respect\Validation\Rules\AbstractRule;
    
    /**
     *
     */
    class TextArray extends AbstractRule
    {
        
        public function validate($input)
        {
            if (preg_match("/^[\d,]+$/", trim($input)) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }