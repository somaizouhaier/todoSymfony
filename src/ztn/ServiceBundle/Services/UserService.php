<?php

namespace ztn\ServiceBundle\Services;

use Symfony\Component\DependencyInjection\Container;

class UserService {
    protected $container;

    public function __construct(Container $container) {
        $this->container = $container;
       
    }
    protected function getMyRepository() {
        return $this->getRepository("atnUtilisateurBundle:User");
    }
    
}

?>
