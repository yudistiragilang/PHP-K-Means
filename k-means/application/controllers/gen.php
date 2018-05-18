<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gen extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data['produk'] = $this->db->get('produk');
		$this->load->view('bg_index',$data);
	}
	
	public function rata_rata()
	{
		$produk = $this->db->get('produk');
		$v = "";
		if(count($produk->result())<0)
		{
			$nilai = floor(($s->transaksi)/1);
			$v = "insert into rata_rata (kode,rata_rata) values ('".$s->kode."','".$nilai."')";
			$this->db->query($v);
		}
		else
		{
			$this->db->query('truncate table rata_rata');
			foreach($produk->result() as $s)
			{
				$nilai = floor(($s->transaksi)/1);
				$v = "insert into rata_rata (kode,rata_rata) values ('".$s->kode."','".$nilai."')";
				$this->db->query($v);
			}
		}
		
		$data['produk'] = $this->db->query('select * from produk left join rata_rata on produk.IdPrd=rata_rata.IdPrd');
		$this->load->view('bg_rata_rata',$data);
	}
	
	public function step1()
	{
		$kluster = 5;
		//81-100 = sangat baik
		//70-80 = baik
		//60-69 = cukup
		//40-59 = kurang
		//0-39 = kurang sekali
		$data['c1'] = rand(16,100);
		$data['c2'] = rand(10,15);
		$data['c3'] = rand(5,9);
		$data['c4'] = rand(3,4);
		$data['c5'] = rand(0,2);
		$produk = $this->db->query('select * from produk left join rata_rata on produk.IdPrd=rata_rata.IdPrd');
		$st = "";
		
		$this->db->query('truncate table hasil');
		foreach($produk->result() as $s)
		{
			$d1 = abs($s->rata_rata-$data['c1']);
			$d2 = abs($s->rata_rata-$data['c2']);
			$d3 = abs($s->rata_rata-$data['c3']);
			$d4 = abs($s->rata_rata-$data['c4']);
			$d5 = abs($s->rata_rata-$data['c5']);
			
			$array_sort_awal = array($d1,$d2,$d3,$d4,$d5);
			$array_sort = $array_sort_awal;
			for ($j=1;$j<=$kluster-1;$j++){
				for ($k=0;$k<=$kluster-2;$k++) {
					if ($array_sort[$k] > $array_sort[$k + 1]){
						$temp = $array_sort[$k];
						$array_sort[$k] = $array_sort[$k + 1];
						$array_sort[$k + 1] = $temp;
					}
				}
			}
			
			for ($i = 0; $i < $kluster; $i++){
				for($r = 0; $r < $kluster; $r++)
				{
					if($array_sort[0]==$array_sort_awal[$r])
					{
						if($r==0) $st =  "Sangat Baik";
						else if($r==1) $st =  "Baik";
						else if($r==2) $st =  "Cukup";
						else if($r==3) $st =  "Kurang";
						else if($r==4) $st =  "Kurang Sekali";
					}
				}
			}
			$this->db->query("insert into hasil (kode,predikat,d1,d2,d3,d4,d5) values('".$s->kode."','".$st."','".$d1."','".$d2."','".$d3."','".$d4."','".$d5."')");
		}
		$data['produk'] = $this->db->query("select * from produk left join (rata_rata,hasil) on produk.IdPrd=rata_rata.IdPrd and produk.IdPrd=hasil.IdPrd");
		$this->load->view('bg_hasil',$data);
	}
}
