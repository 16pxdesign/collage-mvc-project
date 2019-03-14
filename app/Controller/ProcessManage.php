<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 24-Feb-19
 * Time: 03:51
 */

class ProcessManage extends Controller
{
    public $process = null;
    public function __construct($session)
    {
        parent::__construct($session);

        if (empty($_POST)) {
            $this->errorMSG .= "Empty";
            echo json_encode(['code' => 404, 'msg' => $this->errorMSG]);
            self::redirect();
        }

    }

    public function addCourse()
    {
        $this->nameValidation($_POST["name"]);
        $this->priceValidation($_POST["price"]);
        $active = $_POST["active"] ? 1 : 0 ;
        if (empty($this->errorMSG)) {
            $return = $this->_model->addCourse($_POST["name"],0, $_POST["desc"], $_POST["price"],$active);
            if (!$return) {
                error_log("Server had no return any saved value");
                echo json_encode(['code' => 404, 'msg' => "Server error"]);
                exit;
            }
            echo json_encode(['code' => 200, 'msg' => "Success"]);
            exit;
        }

        echo json_encode(['code' => 404, 'msg' => $this->errorMSG]);
        exit;


    }

    public function updateCourse()
    {
        $this->nameValidation($_POST["name"]);
        $this->priceValidation($_POST["price"]);
        $active = $_POST["active"] ? 1 : 0 ;
        if (empty($this->errorMSG)) {

            $return = $this->_model->updateCourse($_POST["id"],$_POST["name"],$_POST["url"], $_POST["desc"], $_POST["price"],$active);
            if (!$return) {
                error_log("Server had no return any saved value");
                echo json_encode(['code' => 404, 'msg' => "Server error"]);
                exit;
            }
            echo json_encode(['code' => 200, 'msg' => "Success"]);
            exit;
        }

        echo json_encode(['code' => 404, 'msg' => $this->errorMSG]);
        exit;


    }

    private function nameValidation($data)
    {
        /* Name VALIDATION */
        $val = new Validation();
        $val->name('name')
            ->value($data)
            ->required()
            ->pattern('text');
        if (!$val->isSuccess())
            $this->errorMSG .= "<p>" . $val->getErrorsFirst() . "</p>";
    }

    private function priceValidation($data)
    {
        /* Name VALIDATION */
        $val = new Validation();
        $val->name('price')
            ->value($data)
            ->required()
            ->pattern('float');
        if (!$val->isSuccess())
            $this->errorMSG .= "<p>" . $val->getErrorsFirst() . "</p>";
    }

    public function addLesson()
    {
        $this->nameValidation($_POST["name"]);

        if (empty($this->errorMSG)) {
            $return = $this->_model->addLesson($_POST["no"],$_POST["name"], $_POST["desc"], $_POST["course_id"],$_POST["url"]);
            if (!$return) {
                error_log("Server had no return any saved value");
                echo json_encode(['code' => 404, 'msg' => "Server error"]);
                exit;
            }
            echo json_encode(['code' => 200, 'msg' => "Success"]);
            exit;
        }

        echo json_encode(['code' => 404, 'msg' => $this->errorMSG]);
        exit;


    }

    public function updateLesson(){
        $this->nameValidation($_POST["name"]);

        if (empty($this->errorMSG)) {
            $return = $this->_model->updateLesson($_POST["no"],$_POST["name"], $_POST["desc"], $_POST["course_id"],$_POST["url"],$_POST["id"]);
            if (!$return) {
                error_log("Server had no return any saved value");
                echo json_encode(['code' => 404, 'msg' => "Server error"]);
                exit;
            }
            echo json_encode(['code' => 200, 'msg' => "Success"]);
            exit;
        }

        echo json_encode(['code' => 404, 'msg' => $this->errorMSG]);
        exit;

    }

}