<?php
namespace App\Http\Requests;

class MessageRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'message' => 'required|min:1',
        ];
    }
}
