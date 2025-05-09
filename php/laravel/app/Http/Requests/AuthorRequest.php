<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthorRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        // 从路由中拿到 {author} 参数，可以是 ID 或模型实例
        $authorId = $this->route('author') instanceof \App\Models\Author
            ? $this->route('author')->id
            : $this->route('author'); // 如果只绑定了 ID

        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('authors', 'email')->ignore($authorId)],
            'bio' => 'nullable|string|max:1000',
        ];
    }
}
