<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoadCatalogRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file' => [
                'file',
                'required',
                'mimes:xlsx',
                'max:30000000'
            ],
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'Поле обезательно для заполнения',
            'file.file' => 'Проверяемое поле должно быть успешно загруженным файлом.',
            'file.max' => 'Значения не должно привышать 255 знаков',
            'file.mimetypes' => 'Невнрный формат файла'
        ];
    }
}
