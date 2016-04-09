<?php
require_once 'application/models/message_model.php';
require_once 'application/models/admin_model.php';
require_once 'application/models/project_model.php';
require_once 'application/models/log_model.php';

//cấu trúc dữ liệu lưu trữ thông tin file đính kèm
class FileDinhKem {

    var $_id_dk;
    var $_folder;
    var $_id_object;
    var $_maso;
    var $_nam;
    var $_thang;
    var $_mime;
    var $_filename;
    var $_type;
    var $_content;
    var $_user;
    var $_id_identify;
    var $_time_update;
    var $_pathFile;
    var $_id_thongtin;
    var $_ID;
    var $_id_project;

}

class filedinhkem_model extends CI_Model {

    //Hàm lấy thư mục lưu trữ tạm file đính kèm
    function getTempPath() {
        $root = '\Upload';
        $temp = '\Upload\Temp';
        if (!file_exists($root))
            mkdir($root);
        if (!file_exists($temp))
            mkdir($temp);
        return $temp;
    }

    //Hàm lấy thư mục lưu file đính kèm
    function getDir($nam, $thang) {

        $root = '\Upload';
        $temp = '\Upload\Temp';
        $dirPath = $root . DIRECTORY_SEPARATOR . $nam . DIRECTORY_SEPARATOR . $thang;
        if (!file_exists($root))
            mkdir($root);
        if (!file_exists($temp))
            mkdir($temp);
        if (!file_exists($root . DIRECTORY_SEPARATOR . $nam))
            mkdir($root . DIRECTORY_SEPARATOR . $nam);
        if (!file_exists($dirPath))
            mkdir($dirPath);
        return $dirPath;
    }

    //Hàm cập nhật tên file đính kèm đã mã hóa vào csdl 
    function md5_update($id_file, $maso) {
        $data = array("MASO" => $maso);
        $where = "ID_DK=" . $id_file;
        $this->db->query("update gen_filedinhkem set MASO=? where $where", $data);
    }

    //lấy file đính kèm 
    function getFileByMaso($maso) {

        $file = $this->db->select('*')->from('gen_filedinhkem')->where("MASO", $maso)->get()->result_array();
        return $file;
    }

    // lưu thông tin file đính kèm vào csdl
    function InsertFileObject($file) {
        $data = array('FOLDER' => $file->_folder,
            'MASO' => $file->_maso,
            'FILENAME' => $file->_filename,
            'USER' => $file->_user,
            'NAM' => $file->_nam,
            'NAM' => $file->_nam,
            'THANG' => $file->_thang,
            'TYPE' => $file->_type,
            'ID_OBJECT' => $file->_id_object,
            'MIME' => $file->_mime,
            'ID_THONGTIN' => $file->_id_thongtin,
            'TIME_UPDATE' => $file->_time_update,
            'ID' => $file->_ID,
            'ID_PR' => $file->_id_project
        );
        $result = $this->db->insert('gen_filedinhkem', $data);

        return $result;
    }

    function getId_Dk() {
        $result = $this->db->select_max('ID_DK')->from('gen_filedinhkem')->get()->result_array();
        return $result;
    }

    function insertFile($idObject, $isTemp, $iddiv, $year, $type, $pdf = 0, $is_nogetcontent = 0) {

        $date = getdate();
        if (!$type)
            $type = -1;
        $year = '2012';

        if (!$idObject)
            $idObject = 0;

        if (!$isTemp)
            $isTemp = 0;

        $model = new filedinhkem_model();

        //Lưu file đính kèm xuống thư mục tạm
        $temp_path = $model->getTempPath();

        //lấy id người đăng nhập
        $user_log = new log_model();
        $user = $user_log->getIdUserLogin();
        foreach ($user as $au);

        //lấy idmessage
        $message_model = new message_model();
        $thongtin = $message_model->getId_Thongtin();
        foreach ($thongtin as $id_thongtin);
        $id_tn = $id_thongtin['id_thongtin'] + 1;

        //lấy idfood
        $food = new admin_model();
        $max_food = $food->getMaxIdFood();
        foreach ($max_food as $food_join);
        $ID = $food_join['ID'] + 1;

        
        //lấy id_project
        $project= new project_model();
        $duan=$project->getMaxId();
        foreach ($duan as $file_project)
        $id_project=$file_project['ID_PR']+1;
        
        
        $filepath = $temp_path . DIRECTORY_SEPARATOR . $_FILES['uploadedfile']['name'];
        if (!move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $filepath)) {
            return -1;
        } else {
            $file = new FileDinhKem();
            $file->_time_update = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
            $file->_nam = $date['year'];
            $file->_thang = $date['mon'];
            $dirPath = $model->getDir($file->_nam, $file->_thang);
            $file->_id_thongtin = $id_tn;
            $file->_folder = $dirPath;
            $file->_id_object = $idObject;
            $file->_ID = $ID;
            $file->_id_project=$id_project;
            $file->_user = $au['ID_U'];
            $file->_filename = $_FILES['uploadedfile']['name'];
            $file->_mime = $_FILES['uploadedfile']['type'];

            $file->_type = $type;
            $model->insertFileObject($file);

            //get attachment id
            $id = $this->getId_Dk();
            foreach ($id as $object)
                $id_file = $object['ID_DK'];

            $maso = $id_file . $file->_filename . $file->_time_update;
            //var_dump($maso);
            $maso = md5($maso);
            $model->md5_update($id_file, $maso);
            $newlocation = $dirPath . DIRECTORY_SEPARATOR . $maso;
            rename($filepath, $newlocation);
            $file->_pathFile = $newlocation;
            $file->_id_dk = $id_file;

            return $id_file;
        }
    }

    /**
     * Ham lay noi dung dang text cua file word hay file pdf
     *
     * @param unknown_type $file
     */
    function getContent($file, $pdf = 0) {
        try {
            chdir($_SERVER['DOCUMENT_ROOT'] . "/tools");
            $scriptpath = "convert.bat";
            $arrfilename = explode(".", $file->_filename);


            $type = $arrfilename[count($arrfilename) - 1];
            $extends = $type;

            copy($file->_pathFile, $file->_pathFile . ".$extends");
            system($scriptpath . ' "' . $file->_pathFile . ".$extends" . '" "' . $file->_pathFile . '.txt"');
            $data = array('CONTENT' => Convert::ConvertToUnicode(file_get_contents($file->_pathFile . '.txt')));
            $this->update($data, 'ID_DK=' . $file->_id_dk);

            if ($pdf == 1) {
                system($scriptpath . ' "' . $file->_pathFile . ".$extends" . '" "' . $file->_pathFile . '.pdf"');
                if (file_exists($file->_pathFile . '.pdf"')) {
                    unlink($file->_pathFile);
                    rename($file->_pathFile . '.pdf', $file->_pathFile);
                    $this->update(array("MIME" => "application/pdf", "FILENAME" => $arrfilename[0] . ".pdf"), 'ID_DK=' . $file->_id_dk);
                }
            }
            unlink($file->_pathFile . '.txt');
            unlink($file->_pathFile . ".$extends");
        } catch (Exception $ex) {
            
        }
    }

    function getFileByIdObjectAndType($idObject, $type) {
        $this->db->where('ID_OBJECT', $idObject);
        $this->db->where('TYPE', $type);
        $select = $this->db->select('*')->from('gen_filedinhkem')->get()->result_array();
        return $select;
    }

    function getListFile($idObject, $isTemp) {
        $select = '';
        if ($isTemp == 1) {
            // //La id tam
            //truong hop id tam type = -1 , 
            $this->db->where('ID_OBJECT', $idObject);
            $this->db->where('TYPE', -1);
            $select = $this->db->select('*')->from('gen_filedinhkem')->get()->result_array();
        } else {
            $this->db->where('ID_OBJECT', $idObject);
            $select = $this->db->select('*')->from('gen_filedinhkem')->get()->result_array();
        }
        return $select;
    }

    function getIdTemp() {
        return $this->db->insert('gen_temp', array());
    }

}

?>