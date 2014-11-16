<?php

namespace ztn\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Util\SecureRandom;
use ztn\UtilisateurBundle\Entity\Clockwork;

/**
 * Controller managing the registration
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author Christophe Coevoet <stof@notk.org>
 */
class UtilisateurController extends Controller {

    public function indexAction() {
       
        return $this->render('ztnUtilisateurBundle:Utilisateur:compte.html.twig', array());
    }

    public function inscrieFacebookAction() {
        $request = $this->getRequest();
        $userRecus = $request->request->get('user');
        $is_email_exist = $this->getDoctrine()->getRepository('ztnUtilisateurBundle:User')->findOneBy(array('email' => $userRecus['email']));
        if (!$is_email_exist) {
            $manager = $this->get('fos_user.user_manager');
            $user = $manager->createUser();
            $user->setUtilisateurNom($userRecus['last_name']);
            $user->setEmail($userRecus['email']);
            $user->addRole('ROLE_USER');
            $secret = md5(uniqid(rand(), true));
            $user->setPassword($secret);
            $user->setUtilisateurPrenom($userRecus['first_name']);
            $user->setFacebookId($userRecus['id']);
            $manager->updateUser($user);
        }
        $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('somaizouhaier@gmail.com')
                ->setTo('somaizouhaier@gmail.com')
                ->setBody('er')
        ;
        $this->get('mailer')->send($message);
        
        
        // Create a Clockwork object using your API key
        $clockwork = new Clockwork('e480ce521643c345ac8116f56bc521ea29f719c4');
// Setup and send a message
        $message1 = array("to" => "+21621852216", "message" => "Hello World");
        $result = $clockwork->send($message1);
// Check if the send was successful
        if ($result["success"]) {
            echo "Message sent - ID: " . $result["id"];
        } else {
            echo "Message failed - Error: " . $result["error_message"];
        }


        return new JsonResponse(array('id' => '1'));
    }

}

?>