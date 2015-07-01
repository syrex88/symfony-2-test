<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use AppBundle\Entity\Test;


class TestController extends Controller {


    public function indexAction() {
        return $this->render('test/index.html.twig');
    }

    /**
     * @return array
     * @View()
     */
    public function getTestsAction() {
       //$tests = $this->getDoctrine()->getRepository("AppBundle:Test")->findAll();
        $em = $this->getDoctrine()->getEntityManager();
        $q = $em->createQueryBuilder()
                ->select('t.id, t.title, t.description')
                ->from('AppBundle:Test', 't')
                ->getQuery();
        $tests = $q->getResult();
        return array("tests" => $tests);
    }
    
    /**
     * param Test $test
     * @return array
     * @View()
     * @ParamConverter("test", class="AppBundle:Test")
     */
    public function getTestAction(Test $test) {
        return array("test" => $test);
    }
    
    public function showAction($id) {
       
        return $this->render('test/test.html.twig', ['id' => $id]);
    }
   
}
