<?php
function static_val(){
    static $x = 10;
    $y =20;
    $x++;
    $y++;
    echo "static: ".$x."<br>";
    echo "non-static: ".$y."<br>";
}

static_val();
static_val();