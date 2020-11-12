<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
          'name'               => 'required|min:3',
          'duration'           => 'required|int',
          'regular'            => 'bool',
          'is_global'          => 'bool',
          'start'              => 'required|date',
          'recurrence'         => 'array',
          'recurrence.weekDay' => 'digits_between:1,7',
          'recurrence.day'     => 'digits_between:1,31',
          'recurrence.week'    => 'digits_between:1,52',
          'recurrence.monthWeek'=> 'digits_between:1,5',
          'recurrence.month'   => 'int',
          'recurrence.monthYear'=> 'digits_between:1,12',
          'recurrence.Year'    => 'int',
        ];
    }
}
