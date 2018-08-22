<?php

class ControllerExtensionModuleFirstModule extends Controller
{

    private $error = array();
    private $data = [];


    public function index()
    {

        $this->load->language('module/first_module');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        $this->getPosts();
        $this->getLanguage();
        $this->setWarnings();
        $this->setBreadcrumbs();

        $this->data['action'] = $this->url->link('extension/module/first_module', 'token=' . $this->session->data['token'], true);

        $this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], true);

        if (isset($this->request->post['after_head']) && isset($this->request->post['after_body'])) {
            $this->data['after_head'] = $this->request->post['after_head'];
            $this->data['after_body'] = $this->request->post['after_body'];
        } else {
            $this->data['after_head'] = $this->config->get('after_head');
            $this->data['after_body'] = $this->config->get('after_body');
        }

        $this->setLayout();

        $this->response->setOutput($this->load->view('module/first_module', $this->data));
    }

    private function setWarnings()
    {
        if (isset($this->error['warning'])) {
            $this->data['error_warning'] = $this->error['warning'];
        } else {
            $this->data['error_warning'] = '';
        }
    }

    private function setBreadcrumbs()
    {
        $this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
        );

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_module'),
            'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], true)
        );

        $this->data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/module/first_module', 'token=' . $this->session->data['token'], true)
        );
    }

    private function getPosts()
    {
        if ($this->isPostMethod() && $this->hasPermision()) {

            $this->model_setting_setting->editSetting('after_head', $this->request->post);
            $this->model_setting_setting->editSetting('after_body', $this->request->post);


            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'], true));
        }
    }


    public function getLanguage()
    {
        $this->data['heading_title'] = $this->language->get('heading_title');
        $this->data['text_edit'] = $this->language->get('text_edit');
        $this->data['text_enabled'] = $this->language->get('text_enabled');
        $this->data['text_disabled'] = $this->language->get('text_disabled');
        $this->data['entry_status'] = $this->language->get('entry_status');
        $this->data['button_save'] = $this->language->get('button_save');
        $this->data['button_cancel'] = $this->language->get('button_cancel');
    }

    public function isPostMethod()
    {
        return $this->request->server['REQUEST_METHOD'] == 'POST' ? true : false;
    }

    public function hasPermision()
    {
        if ($this->user->hasPermission('modify', 'module/first_module')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        return !$this->error;
    }

    private function setLayout()
    {

        $this->data['header'] = $this->load->controller('common/header');

        $this->data['column_left'] = $this->load->controller('common/column_left');

        $this->data['footer'] = $this->load->controller('common/footer');

    }
}