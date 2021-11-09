<?php

namespace App\Helpers;

/**
 * 
 */
class CustomResponse
{
    /**
     * makes response array
     *@return $response array
     *@param $status,$message,$data		 
     */
    public static function make_response($status, $message, $data = null)
    {
        $response['status'] = $status;
        $response['message'] = $message;
        if ($data) {
            $response['data'] = $data;
        }
        return $response;
    }

    public static function validation_error_response($status, $message, $errors)
    {
        $response['status'] = $status;
        $response['message'] = $message;
        if ($errors) {
            $response['data']['error'] = $errors;
        }
        return $response;
    }

    public static function format_errors($errors)
    {
        if (!is_array($errors)) {
            return false;
        }
        $formatted_errors = array();
        foreach ($errors as $key => $value) {
            $formatted_errors[$key] = $value[0];
        }
        return $formatted_errors;
    }
}