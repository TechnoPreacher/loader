<?php

//show tree from nested array: stem in column with tabulated leafs
//if have no leafs - print plain array in column
//if $convoluted display only unic leafs

function echoPlainArray(array $arrayToEcho)
{
$arrayWithHexFiles=[];

    foreach ($arrayToEcho as $k => $v) {
        if (is_array($v)) {

            foreach ($v as $k2=>$v2) {

$arrayWithHexFiles[$k][]= pathinfo($k2,PATHINFO_FILENAME);

            }
            $arrayWithHexFiles[$k]=   array_unique($arrayWithHexFiles[$k]);

            $arrayWithHexFiles[$k]=array_flip($arrayWithHexFiles[$k]);

        }
      else {
           $arrayWithHexFiles[]=$k ;
        }

    }


    echoNestArray( $arrayWithHexFiles);



}

function echoNestArray(array $arrayToEcho)
{
    foreach ($arrayToEcho as $k => $v) {
        if (is_array($v)) {
            echo $k . "<br>\n";
            foreach ($v as $k2=>$v2) {
                echo '&nbsp &nbsp &nbsp' .
                    $k2
                    . "<br>\n";
            }
            echo "<br>\n";
        } else {
            echo $k . "<br>\n";
        }

    }

}


function echoArray(array $arrayToEcho, bool $convoluted = false)
{
    if ($convoluted) {
        echoPlainArray($arrayToEcho);
    } else {
      echoNestArray($arrayToEcho);
    }

}
