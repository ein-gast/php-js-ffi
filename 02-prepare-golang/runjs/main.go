package main

import "C"

import (
	"os"

	"github.com/dop251/goja"
)

var vm *goja.Runtime = nil

func init() {
	vm = goja.New()
}

//export RunJs
func RunJs(script string) *C.char {
	val, err := vm.RunString(script)
	if err != nil {
		return nil
	}
	return C.CString(val.String())
}

func main() {
	if len(os.Args) <= 1 {
		return
	}
	print(os.Args[1], "\n")
	res := RunJs(os.Args[1])
	print(C.GoString(res), "\n")
}
