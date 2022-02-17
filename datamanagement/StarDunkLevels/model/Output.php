<?php
class Output{

    public function __construct()
    {

    }
    public function __destruct()
    {
        
    }
    public function createTable($entries, $ftable){
        $html ='<table class="' .$ftable. '">';
        foreach ($entries as $entry) {
            $html .="<tr>";
    
            foreach ($entry as $key => $val) {
              // echo "createtable function debug result".$[1][0];
                $html .="<td>" .$val. "</td>";
            }
            $html.="</tr>";
        }
        $html.= "</table>";
        return $html;
    }
        
    



}




?>