<?

class file extends CI_Controller {

    function attach() {
        $date = getdate();
        $year = '2012';
        $iddiv = $this->input->post('iddiv');
        if (!$year)
            $year = $date['year'];
        $idObject = $this->input->post('idObject');
        $is_new = $this->input->post('is_new');

        //new model instance
        $this->load->model('filedinhkem_model');
        if ($is_new == 1) {

            //truong hop chua co id cua Object va chua khoi tao id Object
            //Tao mot truong id Object tam cho 

            $idObject = $this->filedinhkem_model->getIdTemp();
        } else {
            //truong hop da co id cua Object
        }

        $data['idObject'] = $idObject;
        //$dataisTemp = $isTemp;
        $data['is_new'] = $is_new;
        $data['year'] = $year;
        //Lay danh sach file dinh kem co idObject va $isTemp
        $type = $this->input->post('type');
        $pdf = $this->input->post('pdf');
        $data['isTemp'] = $this->input->post('isTemp');
        $is_nogetcontent = $this->input->post('is_nogetcontent');


        if ($type != -1)
            $data['data'] = $this->filedinhkem_model->getFileByIdObjectAndType($idObject, $type);
        else
            $data['data'] = $this->filedinhkem_model->getListFile($idObject, $isTemp);
        $data['iddiv'] = $iddiv;
        $data['type'] = $type;
        $data['pdf'] = $pdf;
        $data['is_nogetcontent'] = $is_nogetcontent;
        //kiem tra quyen truy cap
        $isreadonly = $this->input->post('isreadonly');
        if (!$isreadonly)
            $isreadonly = 0;
        $isCapnhat = 1;
        if ($is_new == 1) {
            $isCapnhat = 1;
        } else {
            if ($isreadonly == 1) {
                $isCapnhat = 0;
            } else {
                $isCapnhat = 1;
            }
        }
        $data['isCapnhat'] = $isCapnhat;
        $this->load->view('/file/attach', $data);
    }

    function download() {
        $date = getdate();
        $year = '2012';
        if (!$year)
            $year = $date['year'];


        $this->load->model('filedinhkem_model');

        $maso = $this->input->post('md5');

        $file = $this->filedinhkem_model->getFileByMaso($maso);

        foreach ($file as $file_object)
            ;
        $filename = $file_object['FILENAME'];
        $mime = $file_object['MIME'];
        $maso = $file_object['MASO'];
        $folder = $file_object['FOLDER'];
        $filepath = $folder . DIRECTORY_SEPARATOR . $maso;

        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-type:" . $mime);
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        echo file_get_contents($filepath);

        exit;
    }

    public function index() {

        //new model instance
        $this->load->model('filedinhkem_model');

		$date=getdate();

        //variable for view
        $data['idObject'] = $this->input->post('idObject');
        $data['isTemp'] = $this->input->post('isTemp');
        $data['year'] =$date['year'];
        $data['iddiv'] = $this->input->post('iddiv');
        $data['type'] = $this->input->post('type');
        $data['from'] = $this->input->post('from');
        $data['pdf'] = $this->input->post('pdf');
        $data['is_nogetcontent'] = $this->input->post('is_nogetcontent');
        //$data['data']=$this->filedinhkem_model->getListFile($idObject,$isTemp);
        $this->load->view('/file/index', $data);
    }

    public function input() {

		$date=getdate();
        $data['idObject'] = $this->input->post('idObject');
        $data['isTemp'] = $this->input->post('isTemp');
        $data['year'] =$date['year'];
        $data['iddiv'] = $this->input->post('iddiv');
        $data['type'] = $this->input->post('type');
        $data['from'] = $this->input->post('from');
        $data['pdf'] = $this->input->post('pdf');
        $data['is_nogetcontent'] = $this->input->post('is_nogetcontent');
        $this->load->view('/file/input', $data);
    }

	
    public function image() {

		$date=getdate();
        $data['idObject'] = $this->input->post('idObject');
        $data['isTemp'] = $this->input->post('isTemp');
        $data['year'] =$date['year'];
        $data['iddiv'] = $this->input->post('iddiv');
        $data['type'] = $this->input->post('type');
        $data['from'] = $this->input->post('from');
        $data['pdf'] = $this->input->post('pdf');
        $data['is_nogetcontent'] = $this->input->post('is_nogetcontent');
        $this->load->view('/file/image', $data);
    }


    function save() {
        
		//get variable from post
        $date = getdate();
        $iddiv = $this->input->post('iddiv');
        $year = '2012';
        $from = $this->input->post('from');
        $is_new = $this->input->post('is_new');
        $pdf = $this->input->post('pdf');
        $is_nogetcontent = $this->input->post('is_nogetcontent');
        $type = $this->input->post('type');
        if (!$type)
            $type = -1;
        if (!$year)
            $year = $date['year'];
        $idObject = $this->input->post('idObject'); //id cua doi tuong chua file dinh kem
        if (!$idObject)
            $idObject = 0;
        $isTemp = $this->input->post('isTemp');
        if (!$isTemp)
            $isTemp = 0;


        //new model instance
        $this->load->model('filedinhkem_model');
        $this->filedinhkem_model->insertFile($idObject, $isTemp, $iddiv, $year, $type, $pdf = 0, $is_nogetcontent = 0);

        if ($from == "attach")
            $url = '/file/attach?iddiv=' . $iddiv . '&idObject=' . $idObject . '&is_new=' . $is_new . '&year=' . $year . '&type=' . $type . "&pdf=" . $pdf . "&is_nogetcontent=" . $is_nogetcontent;
        else
            $url = '/file/input?iddiv=' . $iddiv . '&idObject=' . $idObject . '&is_new=' . $is_new . '&year=' . $year . '&type=' . $type . "&pdf=" . $pdf . "&is_nogetcontent=" . $is_nogetcontent;

        echo "<script> window.parent.loadDivFromUrl('" . $iddiv . "','$url" . "',1); </script>";
        //var_dump($this->input->posts());
        exit;
    }

}

?>