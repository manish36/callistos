<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*
    public function authorize()
    {

        return false;
    }

*/
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

                'title' => 'required',
                'author' => 'required',
                'description' => 'required|min:50',
                'price'=>'required|numeric',
                'book_cover'=>"required|image"            //
        ];
    }

    public function messages()
    {
     return [

                'title.required' => 'Book Title Must Be Mentioned',
                'author.required' => 'Please Write Author Name',
                'description.required' => 'Please Write Description',
                'description.min' => 'Must Be  more than 50 Characters',
                'price.required'=>'Please Write Price Of Books',
                'price.required'=>'Please Write Price in Number',
                'book_cover.required'=>"Please Select Image",
                'book_cover.image'=>"Please Select Standard Formats(jpeg,png)",
                            //
        ];   
    }
}
