<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Routing\ClassResourceInterface;
use AppBundle\Entity\User;
use AppBundle\Entity\Test;
use AppBundle\Entity\UserAnswer;
use AppBundle\Entity\Answer;
use AppBundle\Entity\UserStatistic;

class UserController extends Controller {

    private $userAnswers = [];
    private $userStatistic = [];
    private $test;
    private $user;
    private $userId;
    private $dataAnswers;
    private $testId;

    public function postUserAnswerAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $request = $this->getRequest();
        $this->testId = $request->request->get('testid');
        $this->userId = $request->request->get('userid');
        $this->dataAnswers = $request->request->get('answer');
        $this->user = $em->find("AppBundle\Entity\User", $this->userId);
        $this->test = $em->find("AppBundle\Entity\Test", $this->testId);

        // print_r($test);

        foreach ($this->dataAnswers as $answer) {

            $answerid = current($answer);
            $questionid = key($answer);
            $this->userAnswers[$questionid][] = $answerid;

            $userAnswer = new UserAnswer;
            $answer = $em->find("AppBundle\Entity\Answer", $answerid);
            $question = $em->find("AppBundle\Entity\Question", $questionid);

            $userAnswer->setUser($this->user);
            $userAnswer->setQuestion($question);
            $userAnswer->setTest($this->test);
            $userAnswer->setAnswer($answer);

            $em->persist($userAnswer);
        }


        $em->flush();
        $em->clear();

        $tmp = $this->updateStatistic();

        return ["success" => "true", "message" => "Спасибо! Ваши ответы на вопросы успешно сохранены, мы с Вами свяжемся в ближайшее время!"];
    }

    private function updateStatistic() {

        $em = $this->getDoctrine()->getEntityManager();
        $questions = $em->getRepository('AppBundle:Question')->findBy(array('test' => $this->testId));

        $this->userStatistic["cntAnswers"] = 0;
        $this->userStatistic["cntTrueAnswers"] = 0;

        foreach ($questions as $question) {
            $checkAnswer = true;
            foreach ($question->answers as $answer) {
                if ($answer->getTrueAnswer() == true and ! in_array($answer->getId(), $this->userAnswers[$question->getId()])) {
                    $checkAnswer = false;
                }
            }
            if ($checkAnswer == true) {
                $this->userStatistic["cntTrueAnswers"] ++;
            }

            $this->userStatistic["cntAnswers"] ++;
        }

        $this->saveDataUserStatistic();

        return $this->userStatistic;
    }

    private function saveDataUserStatistic() {
        $em = $this->getDoctrine()->getEntityManager();
        
        $this->user = $em->find("AppBundle\Entity\User", $this->userId);
        $this->test = $em->find("AppBundle\Entity\Test", $this->testId);
        
        $userStatistic = new UserStatistic;
        $userStatistic->setCountTrueAnswers($this->userStatistic["cntTrueAnswers"]);
        $userStatistic->setCountAnswers($this->userStatistic["cntAnswers"]);
        $userStatistic->setUser($this->user);
        $userStatistic->setTest($this->test);


        $em->persist($userStatistic);
        $em->flush();
        $em->clear();
    }

}
