<?php
    
    namespace App\Validation;
    
    use Respect\Validation\Validator as Respect;
    use Respect\Validation\Exceptions\NestedValidationException;
    
    /**
     *
     */
    class Validator
    {
        protected $errors;
        protected $params = [];
        
        public function validate($request, array $rules, $optional = [])
        {
            foreach ($rules as $field => $rule) {
                
                $param = $request->getParam($field);
                if (!is_null($param)) $this->params[$field] = trim($param);
                
                try {
                    $rule->setName(ucfirst($field))->assert($request->getParam($field));
                } catch (NestedValidationException $e) {
                    if ((in_array($field, $optional) || $optional === "ALL") && is_null($request->getParam($field))) {
                        continue;
                    }
                    $this->errors[$field] = $e->getMessages();
                }
                
            }
            
            $_SESSION['errors'] = $this->errors;
            
            return $this;
        }
        
        public function getResult()
        {
            return $this->params;
        }
        
        public function failed()
        {
            return !empty($this->errors);
        }
    }