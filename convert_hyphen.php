<?php

/*********
 * 日本語のハイフンを半角ハイフンに統一するクラス
 * {Unicode}
 * -:{002D}：半角ハイフン
 * ⁻:{207B}
 * ₋:{208B}
 * ‐:{2010}
 * ‒:{2012}
 * –:{2013}
 * —:{2014}
 * ―:{2015}
 * −:{2212}
 * ─:{2500}
 * ━:{2501}
 * ➖:{2796}
 * ー:{30FC}
 * ㅡ:{3161}
 * －:{FF0D}
 * ｰ:{FF70}
 */

 // sample code
$text = '|⁻|₋|‐|‒|–|—|―|−|─|━|➖|ー|ㅡ|－|ｰ|';
$ConvertHyphenClass = new ConvertHyphenClass();
echo $ConvertHyphenClass->convert_hyphen($text);

class ConvertHyphenClass {

    private $target_regexs  = '/[\x{207B}\x{208B}\x{2010}\x{2012}\x{2013}\x{2014}\x{2015}\x{2212}\x{2500}\x{2501}\x{2796}\x{30FC}\x{3161}\x{FF0D}\x{FF70}]/u';
    private $result_regex = '-';

    function convert_hyphen($text){
        $input_text  = mb_convert_encoding($text,'UTF-8','auto');
        $retrun_text = preg_replace($this->target_regexs,$this->result_regex,$input_text);
        return $retrun_text;
    }
    
}

?>
