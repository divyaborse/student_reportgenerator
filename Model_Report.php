<?php

class Model_Report extends CI_Model{
	public function fetch(){
	//	$this->db->order_by('q_id','DESC');
		return $this->db->get('student');
	}
	
	public function fetch_single_details($id){
		$this->db->where('id',$id);
		$data = $this->db->get('student');
		$output = '<table width = 100% cellspacing = "5" cellpadding= "5">';
		foreach($data->result() as $row){
			$output .= '
			<tr>
			<td width ="75%">
			<p><b>Student_id : </b>'.$row->id.'</p>
			<p><b>Student_Name : </b>'.$row->Name.'</p>
			<p><b>Student_Number : </b>'.$row->Number.'</p>
			<p><b>Email : </b>'.$row->Email.'</p>
			<p><b>School_name : </b>'.$row->School_name.'</p>
			<p><b>Class : </b>'.$row->Class.'</p>
			<p><b>Gender : </b>'.$row->Gender.'</p>
			
			</td>
			</tr>
			';
		}
		$output .= '
		<tr>
		<td colspan ="2" align ="center"><a href = "'.base_url().'Report_controller" class = "btn btn-primary">Back</a></td>
		</tr>
		';
		$output .= '</table>';
		return $output;
	}
}
?>