<?php

namespace App\Http\Requests\Post;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }

    protected function passedValidation()
    {
        /** @var Post $this */
        return $this->merge([
            'slug' => Str::slug($this->title) . '-' . now()->timestamp,
            'user_id' => 1
        ]);
    }
}
