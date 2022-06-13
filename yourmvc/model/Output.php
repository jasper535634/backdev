<?php

class Output
{

    public function __construct()
    {
    
    }
    public function __destruct()
    {
    }
    //wordt 2d array verwacht
    public function createTable($entries, $ftable, $direction='read' ,$controller='contacts')
    {
        $tableheader = false;
        $html = "";
        $html .= '<table class="' . $ftable . '">';
        foreach ($entries as $row) {
            if ($tableheader == false) {
                $html .= "<tr>";
                foreach ($row as $key => $value) {
                    $html .= "<th>{$key}</th>";
                }
                $html .= "<th>actions</th>";
                $html .= "</tr>";
                $tableheader = true;
            }
            $html .= "<tr>";
            foreach ($row as $key => $value) {
                $html .= "<td data-title='{$key}'>{$value}</td>";
            }
            $html .= "<td><a href='index.php?controller=".$controller."&op=".$direction."&id=" . $row['id'] . 
            "'><i class=\"fa-brands fa-readme\"></i>Read</a><a href='index.php?op=update&id=" . $row['id'] . 
            "'><i class=\"fa-solid fa-pencil\"></i>Update</a><a href='index.php?op=delete&id=" . $row['id'] . 
            "'onclick=\"return confirm('Are you sure you want to delete?');\"><i class=\"fa-solid fa-trash-can\"></i>Delete</a></td>";
            $html .= "</tr>";
        }
        $html .= "</table>";
        return $html;
    }
    public function createlist($enteries){
        $html = '<ul>';
        foreach ($enteries as $entery) {
    
            foreach ($entery as  $value) {
                $html .= "<li>" . $value . "</li>";
            }
        }
        $html .= '</ul>';
        return $html;
    }
    public function createPageButton($pages){
        $html="";
        for($i = 1; $i <= $pages; $i++){
            $html.="<a href=index.php?op=readpage&page=" .$i. ">" .$i. "</a>";
            
        }
        return $html;
    }
    public function createBlog($contents, $img)
    {
        $html = '';
        $html = '<div>';
        foreach ($contents as $content) {
            $html = '<div>';
            $html .= '<h1>' .$content['title']. '</h1>';
            $html .= '<h5>' .$content['author']. '</h5>';
            $html .= '<div>' .$content['content']. '</div>';
            $html .= '<a href="'.$content['socialmedia'].'" class="fa fa-linkedin"></a>';
        }
        $html .= '</div>';

        foreach ($img as $imgUrl) {
            // $html .= "<p>".$imgUrl."</p>";
            $html .= '<img style="width: 960px; height:540px;" src=./view/assets/images/'.$imgUrl.'></p>';
            
        }
        $html .= '</div>';
        return $html;
    }
    




    // public function createBlog($content, $img)
    // {
    //     $html = '<ul>';
    //     foreach ($content as $entery) {
    
    //         foreach ($entery as  $value) {
    //             var_dump($value);
    //             $html .= "<li>" . $value . "</li>";
    //         }
    //     }
    //     $html .= '</ul>';
    //     foreach ($img as $imgUrl) {
    //         $html .= '<p>'.$imgUrl.'</p>';
    //         $html .= '<img src=./view/assets/images/'.$imgUrl.'></p>';
    //     }
    //     return $html;
    // }
    
}


?>