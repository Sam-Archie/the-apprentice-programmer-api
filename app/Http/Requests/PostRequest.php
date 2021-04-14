<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            "user" => [
                "user_id" => ["required", "integer"],
                "username" => ["required", "string"]
            ],
            "title" => ["required", "string"],
            "user_name" => ["required", "string"],
            "content" => ["required", "string"],
            "likes" => ["integer"],
            "user_id" => ["required", "integer"],
            "comments" => ["array"],
            "tags" => ["required", "array"],
            "tags.*" => ["string", "max:30"],
        ]; 
    }
}
