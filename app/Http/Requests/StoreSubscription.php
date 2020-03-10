<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscription extends FormRequest
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
        $rules = [
            'name' => 'required',
            'document_id' => 'required',
            'economic_activities' => 'required',
            'economic_activity_start' => 'required',
            'subscription_category_id' => 'required',
            'is_public' => 'required',
            'persons_qt' => 'required',
            'candidate' => 'required'
        ];
        if ($this->request->subscription_category_id === 1) {
            $rules['practice_resume'] = 'required';
            $rules['results'] = 'required';
        } elseif ($this->request->subscription_category_id === 2) {
            $rules['practice_name'] = 'required';
            $rules['practice_resume'] = 'required';
            $rules['results'] = 'required';
        }

        return $rules;
    }
}
