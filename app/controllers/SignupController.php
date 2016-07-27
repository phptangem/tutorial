<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/27
 * Time: 22:11
 */
use Phalcon\Mvc\Controller;

class SignupController extends Controller
{
    public function indexAction()
    {
    
    }

    public function registerAction()
    {
        $user = new Users();

        //Store and check for errors
        $success = $user->save($this->request->getPost(), array('name', 'email'));

        if($success){
            echo "Thank you for registering!";
        }else{
            echo "Sorry, the following problems were generated";
            foreach($user->getMessages() as $message){
                echo $message->getMessage()."<br />";
            }
        }
        $this->view->disable();
    }
}