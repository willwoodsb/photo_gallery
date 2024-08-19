<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidFilename implements Rule
{
    /**
     * The regular expression for allowed characters.
     *
     * @var string
     */
    protected $pattern = '/^[a-zA-Z0-9 ._,\'&-]+$/';

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Extract the filename from the file object
        $filename = pathinfo($value->getClientOriginalName(), PATHINFO_FILENAME);

        return preg_match($this->pattern, $filename);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute contains invalid characters.';
    }
}