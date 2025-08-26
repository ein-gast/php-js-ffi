<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use App\Service\RunJs;
use Closure;

class ValidName implements ValidationRule
{

    protected RunJs $runjs;
    protected string $javascript;

    public function __construct(RunJs $runjs)
    {
        $this->runjs = $runjs;
        $javascript = file_get_contents(resource_path('js/validator.js'));
        // ну да, а что вы хотите? ECMAScript 5.1
        $this->javascript = preg_replace('#^export\sfunction#um', 'function', $javascript) . ";";
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $code = $this->javascript . 'validateName("' . addcslashes($value, '"') . '");';
        $error = $this->runjs->RunJs($code);
        if (strlen($error > 0)) {
            $fail($error);
        }
    }
}
