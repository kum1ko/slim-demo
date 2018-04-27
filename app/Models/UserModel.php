<?php
    
    namespace App\Models;
    
    use App\Models\AkagaModel;
    
    
    class UserModel extends AkagaModel
    {
        
        protected $table = 'USER';
        protected $primaryKey = "UID";
        // const CREATED_AT = 'CREATED_AT';
        // const UPDATED_AT = 'UPDATE_AT';
        // protected $timestamps = false;
        
        
        protected $fillable = [
            'GGGGG',
        ];
        
        public function getInfo($UID)
        {
        
        }
    }