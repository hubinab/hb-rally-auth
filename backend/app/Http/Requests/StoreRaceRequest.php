<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can("create-race");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "string","min:3", "max:255"],
            "location" => ["required", "string", "min:3", "max:50"],
            "date" => ["required", "date", "after:today"],
            "type" => ["required", "string", "max:255", Rule::in(["Group A", "Group B", "Group C", "Group D"])]
        ];
    }
}
