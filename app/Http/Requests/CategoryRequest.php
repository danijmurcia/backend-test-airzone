<?php

namespace App\Http\Requests;

class CategoryRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];

        switch ($this->method()) {
            case 'PUT':
            case 'POST':
                $rules = [
                    'name' => 'required',
                    'slug' => 'required',
                    'parent_id' => 'integer',
                    'visible' => 'required|boolean' //En base de datos es un tinyint pero intuyo que el campo visible sea un booleano para mostrar/ocultar categorias
                ];

                break;
        }

        return $rules;
    }
}
