<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function fdatetodb($x){
		return date('Y-m-d',strtotime($x));
	}
	function fdatetimetodb($x){
		return date('Y-m-d H:i:s',strtotime($x));
	}
	function fdate($x){
		if($x=='' || $x==null || $x=='0000-00-00' || $x=='0000-00-00 00:00:00')
			return '';
		else
			return date('d-m-Y',strtotime($x));
	}
	function fdatebulan($bln){
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$result = $BulanIndo[(int) $bln - 1] ;
		return $result;
	}
	function fdateindo($x){
		$dt = date('Y-m-d',strtotime($x));
		$tm = date('H:i:s',strtotime($x));
		$time = $tm=='00:00:00'?'':date(' h:i A',strtotime($tm));
		$bulan = array (1 => 'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
		$split = explode('-', $dt);
		if($x=='' || $x==null || $x=='0000-00-00' || $x=='0000-00-00 00:00:00')
			return '';
		else
			return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0].$time;
	}
	function fdatetime($x){
		if($x=='' || $x==null || $x=='0000-00-00' || $x=='0000-00-00 00:00:00')
			return '';
		else
			return date('d/m/Y h:i A',strtotime($x));
	}

