<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 30-Jan-19
 * Time: 10:41
 */

class Test extends Controller
{
    public function __construct($session)
    {
        parent::__construct($session);
    }

    public function js(){
        $this->_view->render('template/header');
        $this->_view->render('js');
        $this->_view->render('template/footer');

    }

    public function run(){
        $this->_view->render('template/header');
        $this->_view->render('t');
        $this->_view->render('template/footer');
    }

    public function in(){

        if(empty($_POST)){
            self::redirect('Index/');
        }
        $errors = array(); //To store errors
        $form_data = array(); //Pass back the data to `form.php`


        /* Validate the form on server side */
        if (empty($_POST['name'])) { //Name cannot be empty
            $errors['name'] = 'Name cannot be blank';
        }

        if (!empty($errors)) { //If errors in validation
            $form_data['success'] = false;
            $form_data['errors']  = $errors;
        } else { //If not, process the form, and return true on success
            $form_data['success'] = true;
            $form_data['posted'] = 'Data Was Posted Successfully';
        }

        //Return the data back to form.php
        echo json_encode($form_data);

    }

}