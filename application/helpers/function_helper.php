<?php

function template_auth($view, $data = [])
{
    $ci = get_instance();
    $ci->load->view('layout/auth_header.php', $data);
    $ci->load->view($view);
    $ci->load->view('layout/auth_footer.php');
}

function template_staff($view, $data = [])
{
    $ci = get_instance();
    $ci->load->view('layout/staff_header.php', $data);
    $ci->load->view($view);
    $ci->load->view('layout/staff_footer.php');
}

function template_mhs($view, $data = [])
{
    $ci = get_instance();
    $ci->load->view('layout/mhs_header.php', $data);
    $ci->load->view($view);
    $ci->load->view('layout/mhs_footer.php');
}

function setToast($pesan = "Data berhasil disimpan", $type = "dark")
{
    $toast = "<div class='position-fixed top-0 start-50 translate-middle-x mt-4' style='z-index: 9999'>
        <div id='myToast' class='toast align-items-center text-white bg-{$type} border-0' role='alert' aria-live='assertive' aria-atomic='true'>
            <div class='d-flex'>
                <div class='toast-body'>
                    {$pesan}
                </div>
                <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
        </div>
    </div>";

    $ci = get_instance();
    $ci->session->set_flashdata('toast', $toast);
}

function is_staff()
{
    $ci = get_instance();
    $staff = $ci->session->has_userdata('sess_staff');
    $mhs = $ci->session->has_userdata('sess_mhs');
    
    if ($mhs) {
        redirect('autentifikasi');
    } else {
        if (!$staff) {
            redirect('login');
        }
    }
}

function is_mhs()
{
    $ci = get_instance();
    $mhs = $ci->session->has_userdata('sess_mhs');
    $staff = $ci->session->has_userdata('sess_staff');
   
    if ($staff) {
        redirect('login');
    } else {
        if (!$mhs) {
            redirect('autentifikasi');
        }
    }
}

function staffdata($key = "staff_id")
{
    $ci = get_instance();
    $staffId = $ci->session->userdata('sess_staff');
    
    $staff = $ci->db->get_where('staff', ['staff_id' => $staffId])->row_array();
    return $staff[$key];
}

function mhsdata($key = "mhs_id")
{
    $ci = get_instance();
    $mhsId = $ci->session->userdata('sess_mhs');

    
    $mhs = $ci->db

        ->get_where('mahasiswa', ['mhs_id' => $mhsId])
        ->row_array();
    
    return $mhs[$key];
}

function selected($data1, $data2, $result = "selected")
{
    return $data1 == $data2 ? "selected" : "";
}
