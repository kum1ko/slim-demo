<?php
    
    namespace App\Controllers;
    

    use Respect\Validation\Validator as v;
    use Illuminate\Database\Capsule\Manager as DB;
    
    class PubController extends Controller
    {
        public function pub($request, $response, $args)
        {
            return $response->withPreJson([]);
        }
    }