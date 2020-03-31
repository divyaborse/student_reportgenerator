<?php
class Report_controller extends CI_Controller{
public function __construct()
{
	parent::__construct();
	$this->load->model('Model_Report');
	$this->load->library('pdf');

}
public function index()
{
	$data['quiz_data'] = $this->Model_Report->fetch();
	$this->load->view('Report_View',$data);
}
public function details(){
if($this->uri->segment(3)){
$id = $this->uri->segment(3);
$data['question_details'] = $this->Model_Report->fetch_single_details($id);
$this->load->view('Report_View',$data);
}
}
public function pdfdetails(){
	if($this->uri->segment(3)){
		$id = $this->uri->segment(3);
		$html_content =  $this->Model_Report->fetch_single_details($id);
		$this->pdf->loadHtml($html_content);
		$this->pdf->render();
		$stream = TRUE;
		 if ($stream) {
        $this->pdf->stream($id.".pdf", array("Attachment" => 0));
    } 
	}
}
}
?>