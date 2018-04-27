<?php
    
    namespace App\Controllers;
    
    
    class HomeController extends Controller
    {
        
        
        public function index($request, $response)
        {
            
            return $response->withJson([
                "response" => [
                    "version"     => "20171111",
                    "build"       => "G68kWlq2",
                    "constantVer" => "20171128",
                    "timestamp"   => time()
                ],
                "msg"      => "Gate of akaga api service",
                "code"     => 1000
            ], 200);
        }
        
        public function ping($request, $response)
        {
            return $response->withPreJson("pong");
        }
    }