<?php
namespace App\Service;

use FFI,
    Exception;

class RunJs
{

    protected FFI $ffi;
    protected FFI\CType $charPtr;

    public function __construct(string $libDir)
    {
        $this->ffi = FFI::cdef(
            file_get_contents($libDir . "/runjs_z.h"),
            $libDir . "/runjs.so",
        );
        $this->charPtr = $this->ffi->type('char *');
    }

    public function RunJs(string $code): string
    {
        $arg = $this->ffi->new("GoString");
        $arg->n = strlen($code);

        $str = $this->ffi->new(type: 'char[' . ($arg->n) . ']');
        FFI::memcpy($str, $code, $arg->n);
        $arg->p = $this->ffi->cast($this->charPtr, $str);

        $res = $this->ffi->RunJs($arg);
        if ($res === null) {
            throw new Exception("JS Error");
        }

        $ret = FFI::string($res);
        FFI::free($res);

        return $ret;
    }
}
