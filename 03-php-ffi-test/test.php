<?php

$libdir = "/opt/runjs/";

class RunJs
{
  protected $ffi;
  protected $charPtr;
  public function __construct($libdir)
  {
    $this->ffi = FFI::cdef(
      file_get_contents($libdir . "/runjs_z.h"),
      $libdir . "/runjs.so",
    );
    $this->charPtr = $this->ffi->type('char *');
  }
  public function RunJs(string $code): string
  {
    $arg = $this->ffi->new("GoString");
    $arg->n = strlen($code);

    $str = $this->ffi->new('char[' . ($arg->n) . ']');
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

$js =  new RunJs($libdir);
$res = $js->RunJs("
function a(x,y){return [1, 3, false, 5, x, y];}
JSON.stringify(a(4, 89))
");

var_dump($res);
