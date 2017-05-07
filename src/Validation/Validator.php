<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 4/5/2017
 * Time: 21:53
 */

namespace App\Validation;

use Respect\Validation\Exceptions\NestedValidationException;

class Validator
{
    protected $errors;

    public function validate($request, array $rules)
    {
        foreach ($rules as $field => $rule) {
            try{
                $rule->setName($field)->assert($request->getParam($field));
            }catch (NestedValidationException $e){
                $this->errors[$field] = $e->getMessages();
            }
        }

        $_SESSION['errors'] = $this->errors;
        return $this;
    }

    public function failed()
    {
        return !empty($this->errors);
    }
}