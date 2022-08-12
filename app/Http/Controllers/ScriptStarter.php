<?php

namespace App\Http\Controllers;


class ScriptStarter extends Controller
{


    public function index()
    {
        //   $stdout = fopen('php://stdout', 'w');
        //   var_dump( $stdout);
        echo "<pre>run builder...</pre>";
        flush();


        $filename = '../' . env('PALM_DIR').'/'. env('PALM_CSV_NAME');
        //system("   python3 flash/src/generate_flashcart_bin.py $filename >c2out");//без него - работает

        $output = `python3 flash/Arduboy-Python-Utilities/flashcart-builder.py $filename`;// > /dev/null &

        echo "<pre>$output</pre>";
        flush();
        echo "<pre>run writer...</pre>";
        flush();

       $filename2 = 'flash/cart/flashcart-image.bin';
        $output = `python3 flash/Arduboy-Python-Utilities/flashcart-writer.py $filename2`;//> /dev/null

        echo "<pre>$output</pre>";
        flush();
    }

//
//   public function execInBackground($cmd) {
//        if (substr(php_uname(), 0, 7) == "Windows"){
//            pclose(popen("start /B ". $cmd, "r"));
//        }
//        else {
//            system($cmd . " > /dev/null &");
//        }
//    }

//   public function execute_prog($exe)
//    {
//        $ret='';
//      //  set_time_limit(5);
//
//
//        $exe_command = escapeshellcmd($exe);
//
//        $descriptorspec = array(
//
//           0 => array("pipe", "r"),  // stdin -> for execution
//
//            1 => array("pipe", "w"),  // stdout -> for execution
//
//            2 => array("pipe", "a") // stderr
//
//        );
//
//        $process = proc_open($exe_command, $descriptorspec, $pipes);//creating child process
//
//
//        if (is_resource($process)) {
//            while (1) {
//                $write = NULL;
//                $read = array($pipes[1]);
//                $err = NULL;
//                $except = NULL;
//
//                if (false === ($num_changed_streams = stream_select($read, $write, $except, 0))) {
//                    /* Error handling */
//                    echo "Errors\n";
//                } else if ($num_changed_streams > 0) {
//                    /* At least on one of the streams something interesting happened */
//
//                    //echo "Data on ".$num_changed_streams." descriptor\n";
//
//                    if ($read) {
//                        echo time()." Data on child process STDOUT\n";
//
//                        $s = fgets($pipes[1]);
//                        print $s . "</br>";
//                        ob_flush();
//                        flush();
//
//                    } else if ($write) {
//                        echo "Data on child process STDIN\n";
//
//                    } else if ($err) {
//                        echo "Data on child process STDERR\n";
//
//                    }
//
//                    $num_changed_streams = 0;
//                }
//
//                $s = fgets($pipes[1]);
//
//                if(empty($s))
//                {
//                    echo "Empty";
//
//                    break;
//                }
//            }
//            fclose($pipes[0]);
//            fclose($pipes[1]);
//            fclose($pipes[2]);
//            echo "exitcode: " . proc_close($process) . "\n";
//        }
//        return $ret;
//    }


//    public function index2()
//    {
//
//        $filename = 'flash/cart/flashcart-index.csv';
//        //system("   python3 flash/src/generate_flashcart_bin.py $filename >c2out");//без него - работает
//
//        $output = `python3 flash/Arduboy-Python-Utilities/flashcart-builder.py $filename >file1`;// > /dev/null &
//        self::execute_prog($output);
//        ob_flush();
//        flush();
//
////        echo "<pre>$output</pre>";
////        echo "<pre>run writer...</pre>";
//
//        $filename2 = 'flash/cart/flashcart-image.bin';
//        $output = "python3 flash/Arduboy-Python-Utilities/flashcart-writer.py $filename2";//> /dev/null
//     //   echo "<pre>$output</pre>";
//      self::execute_prog($output);
//        ob_flush();
//        flush();
//    }

}
