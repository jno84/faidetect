<?php
class Fai2{
 static private $arr_providers = array(
        'wanadoo.fr' => 'ORANGE',
        'orange.fr' => 'ORANGE',
        'proxad.net' => 'FREE',
        'online.net' => 'FREE',
        'online.fr' => 'FREE',
        'free.fr' => 'FREE',
        'gaoland.net' => '9TELECOM',
        '9tel.net' => '9TELECOM',
        'neuf.fr' => '9TELECOM',
        'n9uf.fr' => '9TELECOM',
        'n9uf.net' => '9TELECOM',
        'sfr.net' => '9TELECOM',
        'aol.com' => 'AOL',
        'aol.fr' => 'AOL',
        'tiscali.fr' => 'ALICE',
        'libertysurf.net' => 'ALICE',
        'libertysurf.fr' => 'ALICE',
        'infonie.fr' => 'ALICE',
        'infonie.net' => 'ALICE',
        'numericable.fr' => 'NUMERICABLE',
        'club-internet.fr' => 'CLUBINTERNET',
        'noos.fr' => 'NOOS',
        'cegetel.net' => 'CEGETEL',
        'cegetel.fr' => 'CEGETEL',
        'bbox.fr' => 'BOUYGUES',
        'tele2.fr' => 'TELE2');

                                        
   /*public static function getProvider() {

            if (isset($_SERVER["GEOIP_ORGANIZATION"]) && $_SERVER["GEOIP_ORGANIZATION"]) {
                $str_domain = $_SERVER["GEOIP_ORGANIZATION"];
            } else if (isset($_SERVER["REMOTE_HOST"]) && $_SERVER["REMOTE_HOST"]) {
                $tmp = explode('.', $_SERVER["REMOTE_HOST"]);
                if (count($tmp) >= 2) {
                    $str_domain = $tmp[count($tmp) - 2] . '.' . $tmp[count($tmp) - 1];
                }
            } else {
                exec('dig +time=2 +retry=0 +short -x ' . $_SERVER["REMOTE_ADDR"], $output);
                if (preg_match('#(.*).#i', implode("\n", $output), $host)) {
                    $tmp = explode('.', $host[1]);

                    if (count($tmp) >= 2) {
                        $str_domain = $tmp[count($tmp) - 2] . '.' . $tmp[count($tmp) - 1];
                    }
                }
            }
     
        if (array_key_exists($str_domain, self::$arr_providers)) {
            return self::$arr_providers[$str_domain];
        }

        return 'UNKNOWN';
    }
 */
 
 
 	public static function getProvider(){
		$str_domain = $_SERVER["GEOIP_ORGANIZATION"];	
		if(array_key_exists($str_domain,self::$arr_providers)) return self::$arr_providers[$str_domain];
		return 'NA';
	}
 
 
 public static function isResidentiel(){
  //return (strcmp(Fai2::getProvider(), 'NA') || in_array($_SERVER['REMOTE_ADDR'], array('109.229.198.188-')))?true:false;
   switch (Fai2::getProvider()) {
            case 'ORANGE':
            case 'ALICE':
            case 'FREE':
   			case 'NUMERICABLE':
   			case '9TELECOM':
   			case 'BOUYGUES':
                return true;
            default:
                return false;
        }
 
 }
 
  public static function isOrange(){
  //return (strcmp(Fai2::getProvider(), 'NA') || in_array($_SERVER['REMOTE_ADDR'], array('109.229.198.188-')))?true:false;
   switch (Fai2::getProvider()) {
            case 'ORANGE':
                return true;
            default:
                return false;
        }
 
 }
 
 
}
?>