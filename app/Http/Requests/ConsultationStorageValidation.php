<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ConsultationStorageValidation extends Request
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
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'diagnosis'=>'required',
            'treatment'=>'required',
            'prescriptions'=>'required',
            'lab_tests'=>'required'
        ];
    }
}
