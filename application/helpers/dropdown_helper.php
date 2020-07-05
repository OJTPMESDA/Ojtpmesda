<?php
if(!function_exists('partners')) {

    function partners()
    {
        $ci =& get_instance();

        $partners = $ci->Company_model->list_all(['CSTATUS' => 1]);

        $option = [];
        if (!empty($partners)) {
            foreach ($partners as $k) {
                $option[$k->CID] = $k->COMPANY_NAME;
            }
        }   

        return $option;
    }
}

if(!function_exists('school')) {

    function school()
    {
        $ci =& get_instance();

        $school = $ci->School_list_model->list_all(['SCHOOL_STATUS' => 1]);

        $option = [];
        if (!empty($school)) {
            foreach ($school as $k) {
                $option[$k->SCHOOL_ID] = $k->SCHOOL_NAME;
            }
        }   

        return $option;
    }
}

?>