<?php

class Session_model_test extends TestCase
{

    public function setup() {
        $this->resetInstance();
        $this->CI->load->model('Session_model');
        $this->obj = $this->CI->Session_model;
    }

    public function test_set_session_value()
    {
        $value = $this->obj->set_session_value('Key', 'Value');
        $this->assertTrue(true, $value);
    }

    public function test_get_session_value()
    {
        $this->obj->set_session_value('Key', 'Value');
        $value = $this->obj->get_session_value('Key');
        $expected = 'Value';
        $this->assertEquals($expected, $value);
    }

    public function test_unset_session_value()
    {
        $this->obj->set_session_value('Key', 'Value');
        $value = $this->obj->unset_session_value('Key');
        $this->assertEquals(true, $value);
    }

}
