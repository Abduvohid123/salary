<?php

namespace App\Http\Requests;

use App\Models\Salary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_create');
    }

    public function rules()
    {
        return [
            'hodim_id' => [
                'required',
                'integer',
            ],
            'salary' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
