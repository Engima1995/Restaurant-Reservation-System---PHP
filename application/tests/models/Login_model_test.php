<?php

class Login_model_test extends TestCase
{

    public function setup() {
        $this->resetInstance();
        $this->CI->load->model('Login_model');
        $this->obj = $this->CI->Login_model;
    }

    public function test_set_and_get_admin_info()
    {
        $this->obj->set_admin_credintials('Admin', '12345');
        $value = $this->obj->get_admin_info();
        $this->assertEquals(true, $value);
    }

    public function test_login_as_someone_else()
    {
        $this->obj->set_admin_credintials('Peter', '1245');
        $value = $this->obj->get_admin_info();
        $this->assertEquals(false, $value);
    }

}
