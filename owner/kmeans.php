<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kmeans extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data['produk'] = $this->db->get('produk');
		$this->load->view('kmeans/bg_index',$data);
	}
	
	public function lanjut()
	{
		$data['produk'] = $this->db->get('produk');
		$id = "";
		$id = $this->db->query('select max(nomor) as m from hasil_centroid');
		foreach($id->result() as $i)
		{
			$id = $i->m;
		}
		$this->db->where('nomor', $id);
		$data['centroid'] = $this->db->get('hasil_centroid');
		$data['id'] = $id+1;
		
		$it = "";
		$it = $this->db->query('select max(iterasi) as it from centroid_temp');
		foreach($it->result() as $i)
		{
			$it = $i->it;
		}
		
		$it_temp = $it-1;
		$this->db->where('iterasi', $it_temp);
		$it_sebelum = $this->db->get('centroid_temp');
		$c1_sebelum = array();
		$c2_sebelum = array();
		$c2_sebelum = array();
		$no=0;
		foreach($it_sebelum->result() as $it_prev)
		{
			$c1_sebelum[$no] = $it_prev->c1;
			$c2_sebelum[$no] = $it_prev->c2;
			$c3_sebelum[$no] = $it_prev->c3;
			$no++;
		}
		
		$this->db->where('iterasi', $it);
		$it_sesesudah = $this->db->get('centroid_temp');
		$c1_sesesudah = array();
		$c2_sesesudah = array();
		$c2_sesesudah = array();
		$no=0;
		foreach($it_sesesudah->result() as $it_next)
		{
			$c1_sesesudah[$no] = $it_next->c1;
			$c2_sesesudah[$no] = $it_next->c2;
			$c3_sesesudah[$no] = $it_next->c3;
			$no++;
		}
		
		if($c1_sebelum==$c1_sesesudah || $c2_sebelum==$c2_sesesudah || $c2_sebelum==$c2_sesesudah)
		{
			?>
				<script>
					alert("Proses iterasi berakhir pada tahap ke-<?php echo $it; ?>\nLihat hasil proses iterasi....????");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."kmeans/hasil'>";
		}
		else
		{
			$this->load->view('kmeans/bg_lanjut_n',$data);
		}
	}
	
	function hasil()
	{
		$data['q'] = $this->db->query('select * from centroid_temp group by iterasi');
		$this->load->view('kmeans/bg_hasil',$data);
	}
}
