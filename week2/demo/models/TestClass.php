<?php

/**
 * Description of TestClass
 *
 * @author User
 */
class TestClass {
        
    private $test;

    /**
     * TestClass constructor.
     * @param $test
     */
    public function __construct($test) {
        $this->setTest($test);
    }
    
    /**
    * Function getTest.
    *    
    * @return String;
    */   
    public function getTest() {
        return $this->test;
    }


    /**
     * Function setTest..
     *
     * @param {String} [$test]
     * @throws Exception
     */
    public function setTest($test) {
        if ( !is_string($test) ) {
            throw new Exception('only string allowed for test');
        }
            
        $this->test = $test;
        
        
    }

    /**
     * function description
     *
     * @param String $param
     */
    
   private function functionName($param) {
       
   }

    
}
