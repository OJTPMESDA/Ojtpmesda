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

?>