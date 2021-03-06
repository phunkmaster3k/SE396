<?php

include_once './autoload.php';

/*
 * The Rest server is sort of like the page is hosting the API
 * When a user calls the page (By url(HTTP), CURL, JavaScript etc.), the server(this Page) will handle the request.
 */
$restServer = new RestServer();

try {
    
    $restServer->setStatus(200);

    //DB you want to get to
    $resource = $restServer->getResource();

    //CRUD operation, get put-update post-create delete
    $verb = $restServer->getVerb();

    // after rescource, item ID
    $id = $restServer->getId();

    // data from form
    $serverData = $restServer->getServerData();
    
    $resourceUCName = ucfirst($resource);
    $resourceClassName = $resourceUCName . 'Resource';

    try {
        $resourceData = new $resourceClassName();
    }catch(InvalidArgumentException $e) {
        throw new InvalidArgumentException($resourceUCName . ' Resource Not Found');
    }

        if ( 'GET' === $verb ) {
            
            if ( NULL === $id ) {
                
                $restServer->setData($resourceData->getAll());                           
                
            } else {
                
                $restServer->setData($resourceData->get($id));
                
            }            
            
        }
                
        if ( 'POST' === $verb ) {
            

            if ($resourceData->post($serverData)) {
                $restServer->setMessage($resourceUCName . ' Added');
                $restServer->setStatus(201);
            } else {
                throw new Exception($resourceUCName .' could not be added');
            }
        
        }
        
        
        if ( 'PUT' === $verb ) {
            //finish this
            if ( NULL === $id ) {
                throw new InvalidArgumentException($resourceUCName. ' ID ' . $id . ' was not found');
            }
            
        }

        //delete
        

   
    
    /* 400 exeception means user sent something wrong */
} catch (InvalidArgumentException $e) {
    $restServer->setStatus(400);
    $restServer->setErrors($e->getMessage());
    /* 500 exeception means something is wrong in the program */
} catch (Exception $ex) {    
    $restServer->setStatus(500);
    $restServer->setErrors($ex->getMessage());   
}


echo $restServer->getReponse();
exit();
