<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
    public function rules(Request $request)
    {

        // if (Request::isMethod('PUT'))
        // {
        //     $post='required|unique:posts,title,'.$request->post_id.',id';

        // }
        // else{
        //    $post= 'required|unique:posts,title';

        // }
        // return [
        //     'title' =>$post,
        //     'title' =>$post,
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ];


    }
}
