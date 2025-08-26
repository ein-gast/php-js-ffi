typedef struct { const char *p; ptrdiff_t n; } _GoString_;

typedef _GoString_ GoString;

extern char* RunJs(GoString script);
