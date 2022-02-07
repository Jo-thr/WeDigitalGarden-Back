<?php

namespace App\Traits;

trait Errors
{
    private $errors = [
        'status' => '',
        'source' => '',
        'details' => ''
    ];

    public function error404()
    {
        // echo 'Error 404';
        $this->errors['status'] = 404;
        $this->errors['details'] = 'Resource not found';

        return response()->json($this->errors, 404);
    }
}
