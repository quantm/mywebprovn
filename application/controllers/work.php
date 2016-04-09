<?

class work extends CI_Controller {

    function index($query_id = 0) {
        //load menu header
        $data['title'] = 'Danh sách công việc';
        $this->load->model('home_menu_model');
        $data['emp_name'] = $this->home_menu_model->getUsernameLogin();
        $this->load->view('header', $data);


        $this->input->loadbyId($query_id);

        //new model instance
        $this->load->model('log_model');
        
        
        $user=$this->log_model->getIdUserLogin();
        foreach($user as $id_user);
        $data['work_send_receive']=$id_user['ID_U'];
        $this->load->model('work_model'); 
        $this->load->model('project_model');
        $data['stat'] = $this->project_model-> getStatusforCombo();
        
        
        //assign value for model
        $result=$this->work_model->SelectAll();
       
        //set variable for view
        $data['work'] =$result['rows'];
        $data['count_work']=$result['num_rows_work'];
        $data['user_delete_work']=$this->work_model->user_right_delete();
        $data['project'] = $this->project_model->SelectAll();
        $data['id_cv'] = $this->input->post('id_cv');
        $this->load->view('/work/index', $data);
    }

    function input() {
        //load menu header
        $data['title'] = 'Thêm mới công việc';
        $this->load->model('home_menu_model');
        $data['emp_name'] = $this->home_menu_model->getUsernameLogin();
        $this->load->view('header', $data);

        //get value from post data
        $id_pr = $this->input->post('id_project');
        //var_dump($id_pr);
        
        //new model instance
        $this->load->model('project_model');
        $this->load->model('log_model');
        $this->load->model('user_model');
        $this->load->model('work_model');


        //lấy id dòng cuối cùng trong csdl
        $max_id_pr = $this->project_model->getMaxId();
        foreach ($max_id_pr as $id)
            ;
        $id_pr = $id['ID_PR'];

        $max_id_el = $this->project_model->getMaxIdElement();
        foreach ($max_id_el as $id)
            ;
        $id_el = $id['ID_ELEMENT'];

        $max_id_w = $this->work_model->getMaxIdWork();
        foreach ($max_id_w as $id)
            ;
        $id_w = $id['ID_WORK'];


        //get name userlogin 
        $name = $this->log_model->getNameUserLogin();
        foreach ($name as $emp_name)
            ;
        $u_name = $emp_name['EMP_NAME'];
         $date = getdate();
        //data for view
        $data['data_work'] = $this->work_model->selectWork();
        $data['max_id_project'] = $id_pr;
        $data['max_id_work'] = $id_w;
        $data['max_id_element'] = $id_el;
        $data['u_name'] = $u_name;
        $data['project'] = $this->project_model->SelectAll();
        $data['user'] = $this->user_model->getUser();
        $data['dep'] = $this->user_model->getDepartment();
        $data['element'] = $this->project_model->select_element_combo();
        $data['status'] = $this->project_model->getStatusforCombo();
        $data['uutien'] = $this->project_model->select_uutien();
        $data['date_start'] = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
        $data['nguoitao'] = $this->log_model->getIdUserLogin();

        //form view
        $this->load->view('/work/input', $data);
    }

    function detail($query_id = 0) {

        //load menu header
        $data['title'] = 'Chi tiết công việc';
        $this->load->model('home_menu_model');
        $data['emp_name'] = $this->home_menu_model->getUsernameLogin();
        $this->load->view('header', $data);

        $this->input->loadbyId($query_id);

        //new model instance
        $this->load->model('project_model');
        $this->load->model('work_model');
        $data['id_w_r'] = $this->work_model->getIdRelation();
        $data['detail'] = $this->work_model->getDetail($query_id);
        $data['receiver'] = $this->work_model->getReceiver($query_id);
        $data['nguoitao'] = $this->project_model->getNguoitao($query_id);
        $data['id'] = $query_id;
        $this->load->view('/work/detail', $data);
    }

    function view_update($query_id = 0) {

        $this->input->loadbyId($query_id);

        //new model instance
        $this->load->model('work_model');
        $detail = $this->work_model->getDetail($query_id);
        foreach ($detail as $id);
        $data['id_uutien_selected'] = $id['ID_UUTIEN'];
        $data['id_stattus_selected'] = $id['ID_STAT'];
        $data['detail'] = $this->work_model->getDetail($query_id);
        $data['id'] = $query_id;
        $this->load->model('project_model');
        $data['status'] = $this->project_model->getStatusforCombo();
        $data['uutien'] = $this->project_model->select_uutien();
        $this->load->view('work/update', $data);
    }

    function delete() {
        $idarray = $this->input->post('DEL');

        $counter = 0;
        while ($counter < count($idarray)) {
            if ($idarray[$counter] > 0) {
                try {
                    $where = 'ID_WORK = ' . $idarray[$counter];
                    $this->db->delete('project_work', $where);
                } catch (Exception $er) {
                    $adderror = $adderror . $idarray[$counter] . ' ; ';
                };
            }
            $counter++;
        }
        redirect('/work/index/');
    }

    function update() {

        //new model instance
        $this->load->model('work_model');
        $this->work_model->update();
        redirect('/work/index/');
    }

    function user_right($query_id = 0) {

        $this->input->loadbyId($query_id);

        //new model instance
        $this->load->model('work_model');
        $data['observer'] = $this->work_model->getNguoitheodoi($query_id);
        $data['id'] = $query_id;
        $this->load->view('/work/rigth_user_obervation', $data);
    }

    function opinion($query_id = 0) {

        $this->input->loadbyId($query_id);

        //new model instance
        $this->load->model('work_model');
        $data['opinion'] = $this->work_model->getOpinion($query_id);
        $data['id'] = $query_id;
        $this->load->view('/work/opinion', $data);
    }

    function attach($query_id = 0) {

        $this->input->loadbyId($query_id);

        //new model instance
        $this->load->model('work_model');

        //view
        $data['doc'] = $this->work_model->select_attach($query_id);
        $this->load->view('/work/attach', $data);
    }

    function relation($query_id = 0) {

        $this->input->loadbyId($query_id);

        //new model instance
        $this->load->model('work_model');
        //$data['relation'] =$this->work_model->getIdRelation();
        $data['relation'] = $this->work_model->getRelationWork($query_id);
        $this->load->view('/work/relation', $data);
    }

    function save() {
        $this->load->model('work_model');
        $this->work_model->save();
        redirect('/work/index/');
    }

    function save_anorther() {
        $this->load->model('work_model');
        $this->work_model->save();
        redirect('/work/input/');
    }

}

?>