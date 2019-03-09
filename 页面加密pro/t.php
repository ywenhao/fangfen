<?php
function e_cape($string, $in_encoding = 'UTF-8',$out_encoding = 'UCS-2') { 
    $return = ''; 
    if (function_exists('mb_get_info')) { 
        for($x = 0; $x < mb_strlen ( $string, $in_encoding ); $x ++) { 
            $str = mb_substr ( $string, $x, 1, $in_encoding ); 
            if (strlen ( $str ) > 1) { 
                $return .= '%'.'u' . strtoupper ( bin2hex ( mb_convert_encoding ( $str, $out_encoding, $in_encoding ) ) ); 
            } else { 
                $return .= '%' . strtoupper ( bin2hex ( $str ) ); 
            } 
        } 
    } 
    return $return; 
}

function getR($length){
    $str = null;
    $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $max = strlen($strPol)-1;
 
    for($i=0;$i<$length;$i++){
     $str.=$strPol[rand(0,$max)];
    }
 
    return $str;
 }

$html = file_get_contents('index.html');

$html=e_cape($html);
$html=str_replace('%',' ',$html);
$change=getR(rand(8,20));
?>
<script>function <?php echo $change;?>(<?php echo $change;?>){document.write((unescape(<?php echo $change;?>)));};<?php echo $change;?>("<?php echo $html;?>".replace(/ /g,'%'));</script>