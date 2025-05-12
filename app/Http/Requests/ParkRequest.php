<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'name' => 'required|string|max:255|unique:parks,name,' . $this->park, 
            'name' => 'required|string|max:255',
            'category_id' => 'required',
            'address' => 'required',
            'area_id' => 'required',
            'state' => 'required',
            'district' => 'required',
            'opening_time' => 'required',
            'closing_time' => 'required',
            'location' => 'required',
            'booking_threshold' => 'required',
            'attraction' => 'required',
            'closing_days' => 'nullable|array',
            'images' => 'nullable|array', 
            'ticket_type_id' => 'required|array|min:1',
            'ticket_type_id.*' => 'exists:ticket_types,id',
            'mrp' => 'required|array|min:1',
            'mrp.*' => 'numeric|min:0',
            'price' => 'required|array|min:1',
            'price.*' => 'numeric|min:0|lte:mrp.*', 
            'helpline' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'The park name is required.',
            'name.unique' => 'This park name is already taken.',
            'location.required' => 'The park location is required.',
            'ticket_type_id.required' => 'At least one ticket type is required.',
            'mrp.*.numeric' => 'MRP must be a valid number.',
            'price.*.numeric' => 'Price must be a valid number.',
            'price.*.lte' => 'Price cannot be greater than MRP.',
        ];
    }
    
}
