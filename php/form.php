<?php

class form {


    public function data_type($data){

        preg_match_all('/\.([a-z]+)$/i',  $data['name'], $result);

        switch($result[0][0]){

            case ".txt":
                $this->work_txt();
            break;

            case ".doc":
                 $this->work_doc();
            break;

            case ".xml":
                $this->work_xml();
            break;

            default:
                echo 'Таких файлов не существует';
            break;

        }
    }
    private function work_txt(){
        var_dump('Логика для тестових файлов');
    }
    private function work_doc(){
        var_dump('Логика для докуметов');
    }
    private function work_xml(){
        var_dump('Логика для хмл');
    }

}


$form = new form();

$form->data_type($_FILES['files']);




//$my_form->data_type();