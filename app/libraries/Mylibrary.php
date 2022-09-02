<?php
date_default_timezone_set('Asia/Jakarta');

class Mylibrary{
	function Size($path){
	    $bytes = sprintf('%u', filesize($path));
		    if ($bytes > 0){
		        $unit = intval(log($bytes, 1024));
		        $units = array('B', 'KB', 'MB', 'GB');

		        if (array_key_exists($unit, $units) === true){
		            return sprintf('%d %s', $bytes / pow(1024, $unit), $units[$unit]);
		        }
		    }
	    return $bytes;
	}

	function seo_title($s) {
	    $c = array (' ');
	    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','–');
	    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
	    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	    return $s;
	}

	function kdauto($tabel, $field, $inisial) {
		$CI =& get_instance();
		$qry = $CI->db->query("SELECT max(".$field.") as n FROM ".$tabel);
		$row = $qry->row_array();
		// echo var_dump($row);
		if ($row['n']=="") {
			$angka=0;
		}
		else {
			$angka = $row['n'];
		}
		
		$angka++;
		$angka =strval($angka); 
		$tmp ="";
		for ($i=1; $i <= strlen($inisial); $i++) {
				$tmp=$tmp."0";
		}
		return $inisial.$tmp.$angka;
	}

	function kdautos($tabel, $field, $inisial) {
		$CI =& get_instance();
		$qry = $CI->db->query("SELECT MAX(CAST(SUBSTRING(".$field.", 12, 2) AS UNSIGNED)) as n FROM ".$tabel." WHERE kode LIKE '%".$inisial."%'");
		$row = $qry->row_array();
		if ($row['n']=="") {
			$angka=0;
		}
		else {
			$angka = $row['n'];
		}
		
		$angka++;
		$angka =strval($angka);
		$tmp ="";
		for ($i=1; $i <= 6; $i++) {
				$tmp=$tmp."0";
		}
		return $inisial.'-'.$tmp.$angka;
	}

	function autolink($str){
	  $str = eregi_replace("([[:space:]])((f|ht)tps?:\/\/[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $str); //http
	  $str = eregi_replace("([[:space:]])(www\.[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $str); // www.
	  $str = eregi_replace("([[:space:]])([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})","\\1<a href=\"mailto:\\2\">\\2</a>", $str); // mail
	  $str = eregi_replace("^((f|ht)tp:\/\/[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)", "<a href=\"\\1\" target=\"_blank\">\\1</a>", $str); //http
	  $str = eregi_replace("^(www\.[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)", "<a href=\"http://\\1\" target=\"_blank\">\\1</a>", $str); // www.
	  $str = eregi_replace("^([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})","<a href=\"mailto:\\1\">\\1</a>", $str); // mail
	  return $str;
	}

	function anti_injection($data){
	  $filter = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
	  return $filter;
	}

	function greeting() {
		//mengatur zona waktu
		  date_default_timezone_set("Asia/Jakarta");
		//variables 
		$welcome_string="Welcome!"; 
		$numeric_date=date("G"); 
		 
		//kondisioal untuk menampilkan ucapan menurut waktu/jam 
		if($numeric_date>=0&&$numeric_date<=11) 
		$welcome_string="Selamat pagi"; 
		else if($numeric_date>=12&&$numeric_date<=14) 
		$welcome_string="Selamat siang";
		else if($numeric_date>=15&&$numeric_date<=17) 
		$welcome_string="Selamat sore"; 
		else if($numeric_date>=18&&$numeric_date<=23) 
		$welcome_string="Selamat malam"; 
		 
		echo "$welcome_string"; 
	}

	function format_rupiah($angka){
	  $rupiah=number_format($angka,0,',','.');
	  return "Rp. ".$rupiah;
	}

	function getBulan($bln){
			switch ($bln){
					case 1: 
						return "Jan";
						break;
					case 2:
						return "Feb";
						break;
					case 3:
						return "Mar";
						break;
					case 4:
						return "Apr";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Jun";
						break;
					case 7:
						return "Jul";
						break;
					case 8:
						return "Agu";
						break;
					case 9:
						return "Sep";
						break;
					case 10:
						return "Okt";
						break;
					case 11:
						return "Nov";
						break;
					case 12:
						return "Des";
						break;
			}
	}

	function hari_ini($tgl){
		
			$hari = $tgl;
		 
			switch($hari){
				case 'Sun':
					$hari_ini = "Ming";
				break;
		 
				case 'Mon':			
					$hari_ini = "Sen";
				break;
		 
				case 'Tue':
					$hari_ini = "Sel";
				break;
		 
				case 'Wed':
					$hari_ini = "Rab";
				break;
		 
				case 'Thu':
					$hari_ini = "Kam";
				break;
		 
				case 'Fri':
					$hari_ini = "Jum";
				break;
		 
				case 'Sat':
					$hari_ini = "Sab";
				break;
				
				default:
					$hari_ini = "Tidak di ketahui";		
				break;
			}
		return $hari_ini;
	}

	function tgl_indo($tgl){
		$tanggal = substr($tgl,8,2);
		$bulan = $this->getBulan(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;		 
	}	

	function tgl_indoo($tgl){
		$tanggal = substr($tgl,8,2);
		$bulan = $this->getBulan(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		return $tanggal.'/'.$bulan;		 
	}

	function mkdir_r($dirName, $rights=0777){
	    $dirs = explode('/', $dirName);
	    $dir='';
	    foreach ($dirs as $part) {
	        $dir.=$part.'/';
	        if (!is_dir($dir) && strlen($dir)>0)
	            mkdir($dir, $rights);
	    }
	}


	function cekAkses($id = null,$link)
	{
		// $CI =& get_instance();
		// $url = $link;
		$str = $link; 
		if(preg_match("/tambah_/", $str)) {
		  $alis = 'create';
		} else if( preg_match("/indeks/", $str) ) {
		  $alis = 'read';
		} else if( preg_match("/ubah_/", $str) ) {
		  $alis = 'update';
		} else if( preg_match("/hapus_/", $str) ) {
		  $alis = 'delete';
		} 
		// $CI->db->query("SELECT * FROM t_role WHERE id_level = ".$id);
	}

}



$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
function getOSs() { 
    global $user_agent;
    $os_platform    =   "Unknown";
    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }   
    return $os_platform;
}

function getBrowser() {
    global $user_agent;
    $browser        =   "Unknown";
    $browser_array  =   array(
                            '/msie/i'       =>  'Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld'
                        );

    foreach ($browser_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}

function famscode($s) {
    $c = array (' ');
    $d = array ('&amp;','amp;','nbsp;','&nbsp;','-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','–');
    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
    $s = strtolower(str_replace($c, ' ', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
}