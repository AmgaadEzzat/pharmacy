<?php

namespace App\Traits;

trait GeneralTrait
{
    public function returnError($errNum, $msg)
    {
        return response()->json([
            'status' => 'false',
            'errNum' => $errNum,
            'message' => $msg
        ]);
    }

    public function returnSuccess($msg)
    {
        return response()->json([
            'status' => 'true',
            'message' => $msg
        ]);
    }

    public function returnData($key, $value, $msg = '')
    {
        return response()->json([
            'status' => 'true',
            'message' => $msg,
            $key => $value
        ]);
    }

    public function returnCodeAccordingToInput($validator)
    {
        $inputs = array_keys($validator->errors()->toArray());

        return $this->getErrorCode($inputs[0]);
    }

    public function returnValidationError($code, $validator)
    {
        return $this->returnError($code, $validator->errors()->first());
    }

    public function getErrorCode($input)
    {
        $code = '';
        if ($input == 'email') {
            $code = 'E007';
        } elseif ($input == 'password') {
            $code = 'E002';
        }

        return $code;
    }
}
