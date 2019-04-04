<?php
//Criado por Anderson Ismael
//24 de agosto de 2018

function view($name,$data=null,$print=true){
    if($name=='404'){
        header('HTTP/1.0 404 Not Found');   
    }
    $filename=ROOT.'view/'.$name.'.php';
    if(file_exists($filename)){
        if(is_array($data)){
            extract($data);
        }
        ob_start();
        require $filename;
        $output=ob_get_contents();
        ob_end_clean();
    }else{
        $output='<b>Erro:</b><br>'.PHP_EOL.'view <b>'.$name.'</b> not found';
    }
    if($print){
        print $output;
    }else{
        return $output;
    }
}
