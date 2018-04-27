<?php
    /**
     * Created by PhpStorm.
     * User: Usagi
     * Date: 2017/11/24
     * Time: 22:21
     */
    
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Model;

    // See https://laravel.com/api/5.4/Illuminate/Database/Query/Builder.html
    
    class AkagaModel extends Model
    {
        
        const CREATED_AT = 'CREATED_AT';
        const UPDATED_AT = 'UPDATE_AT';
        
        public function setParams($param, $value)
        {
            if (!is_null($value)) {
                $name = strtoupper($param);
                $this->$name = $value;
            }
            
        }
        
        public function format(array $array)
        {
            $temp = [];
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    $temp[$k] = $this->format($v);
                } else {
                    $temp[$k] = is_null($v) ? "" : $v;
                }
            }
            
            return $temp;
        }
    }