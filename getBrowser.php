<?php
function getBrowser($ua){

        $mobile_browser = '0';
 $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
 $mobile_agents = array('w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac', 'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno', 'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-', 'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-', 'newt','noki','oper','palm','pana','pant','phil','play','port','prox', 'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar', 'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-', 'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp', 'wapr','webc','winw','winw','xda','xda-');

 if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', strtolower($_SERVER['HTTP_USER_AGENT']))){$mobile_browser++;}
 if((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))){$mobile_browser++;}
 if(in_array($mobile_ua, $mobile_agents)){$mobile_browser++;}
 if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'OperaMini') > 0){$mobile_browser++;}
 if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows') > 0){$mobile_browser = 0;}

        if($mobile_browser > 0){return -1;}
 if(preg_match('/Chrome/i',$ua)){return 0;}
 elseif(preg_match('/MSIE 9.(.+)/i',$ua)){return 1;}
 elseif(preg_match('/MSIE 8.(.+)/i',$ua)){return 2;}
 elseif(preg_match('/MSIE 7.(.+)/i',$ua)){return 3;}
 elseif(preg_match('/Firefox/i',$ua)){return 4;}
 elseif(preg_match('/Safari/i',$ua)){return 5;}
 elseif(preg_match('/Flock/i',$ua)){return 6;}
 elseif(preg_match('/Opera/i',$ua)){return 7;}
 elseif(preg_match('/Netscape/i',$ua)){return 8;}
}
$navegador = getBrowser($_SERVER['HTTP_USER_AGENT']);

if($navegador < 0) echo "Navegador móvil";
else if($navegador == 0) echo "chrome";
else if($navegador > 0 && $navegador < 4){
	if( $navegador == 1 ) echo "IE9";
	else if( $navegador == 2 ) echo "IE8";
	else if( $navegador == 3 ) echo "IE7";
}
else if($navegador == 4) echo "firefox";
else if($navegador == 5) echo "safari";
else if($navegador == 6) echo "flock";
else if($navegador == 7) echo "opera";
else if($b == 8) echo "netscape";

