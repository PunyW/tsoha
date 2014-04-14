<?php

class Form {

    private $postData = array();
    private $currentItem = null;
    private $validator;
    private $errors;

    function __construct() {
        $this->validator = new FormValidator();
    }

    public function post($field) {
        $input = htmlEncode($_POST[$field]);
        if ($input) {
            $this->postData[$field] = $input;
            $this->currentItem = $field;
        }
        return $this;
    }

    /**
     * 
     * Returns the posted data
     * 
     * @param type $fieldName
     * @return type
     */
    public function fetch($fieldName = false) {
        if ($fieldName) {
            if (isset($this->postData[$fieldName])) {
                return $this->postData[$fieldName];
            } else {
                return false;
            }
        } else {
            return $this->postData;
        }
    }

    /**
     * Validate
     */
    public function validate($typeOfValidator, $fieldName, $arg = null) {
        if ($arg == NULL) {
            $error = $this->validator->{$typeOfValidator}($this->postData[$this->currentItem], $this->currentItem);
        } else {
            $error = $this->validator->{$typeOfValidator}($this->postData[$this->currentItem], $arg, $this->currentItem);
        }

        if ($error) {
            $this->errors[$fieldName] = $error;
        }
        return $this;
    }

    public function submit() {
        if (empty($this->errors)) {
            return true;
        } else {
            $str = '<ul>';

            foreach ($this->errors as $key => $value) {
                $str .= '<li>' . ucfirst($key) . ' ' . $value . '</li>';
            }

            $str .= '</ul>';
            return $str;
        }
    }

}
