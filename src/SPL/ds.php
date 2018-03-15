<?php
$a = "new string";
$b =& $a;
// the variable b points to the variable a
xdebug_debug_zval( 'a' );
xdebug_debug_zval( 'b' );
// change the string and see that the refcount is reset
$b = 'changed string';
xdebug_debug_zval( 'a' );
xdebug_debug_zval( 'b' );

$arr = ['name' => 'Bob', 'age' => 23 ];
xdebug_debug_zval( 'arr' );