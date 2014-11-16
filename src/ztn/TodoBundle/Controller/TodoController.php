<?php

namespace ztn\TodoBundle\Controller;

use ztn\TodoBundle\Entity\Event;
use ztn\TodoBundle\Form\Type\CreateEventFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class TodoController extends Controller {

    public function indexAction() {
        //o
        $request = $this->container->get('request');
        $event = new Event();
        $user = $this->getUser();
        $formulaire = $this->createForm(new CreateEventFormType(), $event);
        if ($request->getMethod() == 'POST') {
            $formulaire->bind($request);
            $event->setEtat(true);
            $event->setUser($user);
            $em = $this->getDoctrine()->getManager();
            //ajouter un evenement
            $em->persist($event);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
                    'success', 'la creation est reussi'
            );
        }
        $events = $this->getDoctrine()->getManager()->getRepository('ztnTodoBundle:Event')->findBy(array(
            'user' => $this->getUser()
        ));

        return $this->render('ztnTodoBundle:todo:index.html.twig', array(
                    'events' => $events,
                    'form' => $this->createForm(new CreateEventFormType())->createView()
        ));
    }

    public function deleteAction() {
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $id = $request->request->get("id");
        }
        $list = $this->getDoctrine()->getManager()->getRepository('ztnTodoBundle:Event')->findOneBy(array(
            'id' => $id
        ));

        $this->getDoctrine()->getManager()->remove($list);
        $this->getDoctrine()->getManager()->flush();
        $this->get('session')->getFlashBag()->add(
                    'success', 'la supression est reussi'
            );

        return new JsonResponse(true);
    }

    public function editEtatAction() {
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $id = $request->request->get("id");
        }
        $event = $this->getDoctrine()->getManager()->getRepository('ztnTodoBundle:Event')->findOneBy(array(
            'id' => $id
        ));
        $event->setEtat(!$event->getEtat());
        $em = $this->getDoctrine()->getManager();
        $em->persist($event);
        $em->flush();
        $this->get('session')->getFlashBag()->add(
                    'success', 'la modification est reussi'
            );
        return new JsonResponse(true);
    }

    public function editAction() {
        $request = $this->get('request');
        $user = $this->getUser();
        if ($request->getMethod() == 'POST') {
            $parametre = $request->request->all();
            $keys = array_keys($parametre);
            if (is_array($keys)) {
                $id = $keys[0];
            }
            $name = $parametre[$id];
            $event = $this->getDoctrine()->getManager()->getRepository('ztnTodoBundle:Event')->findOneBy(array(
                'id' => $id
            ));

            $event->setName($name);
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                    'success', 'la modification est reussi'
            );
        }
        return $this->redirect($this->generateUrl('ztn_todo_homepage'));
    }

}
