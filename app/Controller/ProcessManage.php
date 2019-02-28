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
        //$this->process = new Process();

    }

    public function addCourse()
    {
        $this->nameValidation($_POST["name"]);
        $this->priceValidation($_POST["price"]);

        if (empty($this->errorMSG)) {
            error_log($_POST['active']);
            $return = $this->_model->addCourse($_POST["name"],0, $_POST["desc"], $_POST["price"], 0);
            if ($return == null) {
                echo json_encode(['code' => 404, 'msg' => "Server error"]);
                exit;
            }
            echo json_encode(['code' => 200, 'msg' => $_POST["username"]]);
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
}