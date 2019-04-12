<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller
{
    public function index()
    {
        $this->load->helper('security');
        $this->load->helper('url');

        $data = $this->get_csrf_params();

        $this->load->view('survey', $data);
    }

    public function save_survey()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->helper('email');
        $this->load->model('survey_model');

        $data = $this->security->xss_clean($this->input->post());
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules($this->get_post_validation_rules());

        if (false === $this->form_validation->run()) {
            $response_data = [
                'errors' => $this->form_validation->error_array(),
                'csrf' => $this->get_csrf_params()
            ];
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response_data))
                ->set_status_header(400);
        }

        $this->survey_model
            ->initialize($data)
            ->insert();

        return $this->output->set_status_header(201);
    }

    private function get_post_validation_rules()
    {
        return [
            [
                'field' => 'name',
                'rules' => 'trim|required|min_length[2]',
                'errors' => [
                    'required' => 'Field \'Name\' is required',
                    'min_length' => 'Minimum Username length is 2 characters'
                ]
            ],
            [
                'field' => 'email',
                'rules' => 'trim|required|valid_email',
                'errors' => [
                    'required' => 'Field \'Email\' is required',
                    'valid_email' => 'Email is not valid'
                ]
            ],
            [
                'field' => 'favorite_color',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field \'Favorite color\' is required',
                ]
            ]
        ];
    }

    private function get_csrf_params()
    {
        return [
            'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash()
        ];
    }
}