<?php 

    $title  = "PHP Sample";
    $mess   = "Hello World - Test PHP";
    $bikes = array("YZF-R6", "YZF-R1M", "YZF-R3", "YZF-R125");

    $x = 0.1;
    $y = 0.2;
    $b = true;
    $i = 7; 

    function test() {
        static $_i = 1;

        echo "<br/>";
        echo "<br/>";
        echo "<u><b>Test # $_i</b></u>";

        $_i++;
    }

    class Bike {

        function Bike() {
            $this->manufacturer = "Yamaha";
            $this->model = "Bike Model";
        }

    }

    $r1m = new Bike();
    $r1m->model = $bikes[1];

?>

<!DOCTYPE html>
<html>

    <head>
        <title><?php echo $title; ?></title>
    </head>

    <body>

        <?php 
    
            #
            # Simple variable testing
            #
            test();
            echo "<br/>";
            echo "MESSAGE: $mess"; 
            echo "<br/>";
            echo "x + y ($x + $y) = ".($x+$y);

            #
            # Test accessing global variables declared at the top
            #
            test();
            echo "<br/>";
            echo "GLOBAL: ".$GLOBALS['y'];
            echo "<br/>";
            echo "Start GLOBALS dumping...";
            echo "<br/>";
            echo "<pre>";
            var_dump($GLOBALS);
            echo "</pre>";
            echo "<br/>";
            echo "End dump";

            #
            # Dumping variable for debugging
            #
            test();
            echo "<!--";
            #echo "<pre>";
            echo "<br/>"; var_dump($mess);
            echo "<br/>"; var_dump($x);
            echo "<br/>"; var_dump($b);
            echo "<br/>"; var_dump($i);
            echo "<br/>"; var_dump($bikes);
            echo "<br/>"; var_dump($r1m);
            #echo "</pre>";
            echo "-->";

            /*
            for () {

            }*/
            
        ?> 

        <br/>

    </body>

</html>