<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlightRequest extends FormRequest
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
            "flight_number"=>"required|string",
            "departure_airport"=>"required|string",
            "arrival_airport"=>"required|string",
            "departure_date"=>"required|date",
            "departure_time"=>"required|date_format:H:i",
            "arrival_date"=>"required|date",
            "arrival_time"=>"required|date_format:H:i",
            "price"=>"required|numeric"
        ];
    }
}
