<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompressPdfRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'pdf' => [
                'required',
                'file',
                'mimes:pdf',
                'max:102400' //100MB
            ],

            'quality' => [
                'nullable',
                'in:screen,ebook,printer,prepress'
            ]
        ];
    }

    public function messages()
    {
        return [
            'pdf.required' => 'Please upload a PDF.',
            'pdf.mimes' => 'Only PDF file allowed.',
            'pdf.max' => 'Maximum file size is 100MB.'
        ];
    }
}