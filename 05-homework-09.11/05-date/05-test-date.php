<?php
    include_once '05-date.php';
    echo '1. constructor :' . PHP_EOL;
    try {
        $date = new Date(29,14,2004);
        echo '  test 1 - fail' . PHP_EOL;
    } catch (Error $error){
        if ($error->getMessage() === 'Incorrect month' . PHP_EOL){
            echo '  test 1 - ok' . PHP_EOL;
        }
    }
    try {
        $date = new Date(29,2,2004);
        echo '  test 2 - ok' . PHP_EOL;
    } catch (Error $error){
        echo '  test 2 - failed (' . $error->getMessage() .')'.PHP_EOL ;
    }

    $date = new Date(29,2,2004);
    echo PHP_EOL;
    echo '2. getMethods: '.PHP_EOL;

    try {
        if ($date->getDay()===29){
            echo "  test 1 - ok \n";
        } else {
            echo 'Incorrect day output: ' . $date->getDay() .PHP_EOL;
            echo "  test 1 - failed\n";
        }

    } catch (Error $error){
        echo '  test 1 - failed (' . $error->getMessage() .')'.PHP_EOL ;
    }

    try {
        if ($date->getMonth()===2){
            echo "  test 2 - ok \n";
        } else {
            echo '  Incorrect month output: ' . $date->getMonth() .PHP_EOL;
            echo "  test 2 - failed\n";
        }

    } catch (Error $error){
        echo '  test 2 - failed (' . $error->getMessage() .')'.PHP_EOL ;
    }
    try {
        if ($date->getYear()===2004){
            echo "  test 3 - ok \n";
        } else {
            echo 'Incorrect year output: ' . $date->getYear() .PHP_EOL;
            echo "  test 3 - failed\n";
        }

    } catch (Error $error){
        echo '  test 3 - failed (' . $error->getMessage() .')'.PHP_EOL ;
    }

    echo PHP_EOL;
    echo '3. printOut :' . PHP_EOL;

    try{
        ob_start();
        echo $date->printOutDate();
        $out1 = ob_get_contents();
        ob_end_clean();
        if($out1==="29/2/2004\n"){
            echo '  test 1 - ok' . PHP_EOL;
        } else echo '  test 1 - false' . PHP_EOL;

    } catch (Error $error){
        echo '  test 1 - failed (' . $error->getMessage() .')'.PHP_EOL ;
    }

    echo PHP_EOL;
    echo '3. set functions :' . PHP_EOL;

    try{
        $date->setYear(2003);
        if($date->getYear()===2004){
            echo '  test 1 - ok' . PHP_EOL;
        } else echo '  test 1 - false' . PHP_EOL;

    } catch (LogicException $error){
        echo '  test 1 - ok (' . $error->getMessage() .')'.PHP_EOL ;
    }
    try{
        $date->setYear(2008);
        if($date->getYear()===2008){
            echo '  test 1.1 - ok' . PHP_EOL;
        } else echo '  test 1.1 - false' . PHP_EOL;

    } catch (LogicException $error){
        echo '  test 1.1 - false (' . $error->getMessage() .')'.PHP_EOL ;
    }
    try{
        $date->setDay(12);
        if($date->getDay()===12){
            echo '  test 2 - ok' . PHP_EOL;
        } else echo '  test 2 - false' . PHP_EOL;

    } catch (LogicException $error){
        echo '  test 2 - failed (' . $error->getMessage() .')'.PHP_EOL ;
    }
    try{
        ob_start();
        $date->setMonth(0);
        if($date->getMonth()===2)
        {
            echo '  test 3 - ok' . PHP_EOL;
        } else echo '  test 3 - false' . PHP_EOL;

    } catch (LogicException $error){
        echo '  test 3 - ok (' . $error->getMessage() .')'.PHP_EOL ;
    }