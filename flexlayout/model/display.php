<?php 
function createList($arr, $classmain, $classdrop=""){
    $html = '<ul class="' . $classmain . '">';
    foreach ($arr as $key => $val) {
      if(is_array($val)){
        $html.= "<li><a href='#' onclick=\"dropdown('".$key."');return false;\" class='dropbtn'>" .$key. "</a><ul class='dropdown-content' id=".$key.">";
        foreach($val as $key => $value){
          $html .="<li><a href='".$value."' class='dropbtn'>".$key. "</a></li>";    
        }
        $html.="</ul></li>";
    }else{
      $html .="<li><a href='".$val."'>".$key."</a></li>"; 
    }
  }
    $html .= '</ul>';
    return $html;
}

function createTable($entries, $ftable){
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
// maak skill bar
function createSkillBar($skill,$level,$color){
    //begin html
    $html = "";
    $html .= "<p>".$skill."</p>";
    $html .= "<div class=\"skillbackdrop\">";
    $html .= "<div class=\"skills\" style=\"width:".$level."%; background-color:".$color.";\">".$level."%</div>";
    $html .= "</div>";
    // eind html
    return $html;
    //class in html verwerken
  
    //styles samengesteld
    // 1specifieke class per bar
    //1 generieke class per bar
}

function createCard($name, $img, $diploma )
{
  $html= "";
  $html .="<div class=\"card\">";
  $html .= "<img class=\"cardimg\" src=\"./media/$img\" alt=\"Avatar\">";
  $html .="<div class=\"cardtext\">";
  $html .= "<h4><b>".$name."</b></h4>";
  $html .= "<p>".$diploma."</p>";
  $html .= "</div>";
  $html .= "</div>";
  return $html;
}

?>