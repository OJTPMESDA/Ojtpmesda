<?php

class Forum_model extends MY_Model
{

	private $table = 'forum';
	private $pk = 'POST_ID';

	public function __construct()
    {	
        parent::__construct();
        $this->tbl = $this->table;
        $this->primary_key = $this->pk;
    }

    public function _union()
    {
    	$data = [];

    	$res = $this->db->query(
    					'SELECT forum.*, partners.FULL_NAME, partners.USER_PHOTO FROM forum LEFT JOIN partners ON PARTNERS_ID = forum.POST_BY_COMPANY WHERE POST_BY_COMPANY = '.$this->session->uid.' AND POST_STATUS = 1
						UNION 
						SELECT forum.*, USERNAME, PHOTO FROM forum LEFT JOIN admin ON admin.ADMIN_ID = POST_BY_ADMIN WHERE POST_BY_ADMIN != 0 AND POST_STATUS = 1
						UNION 
						SELECT forum.*, FULL_NAME , USER_PHOTO FROM forum LEFT JOIN students ON USERID = POST_BY_STUDENT WHERE POST_BY_STUDENT IN (SELECT USERID FROM students WHERE COMPANY_ID = '.$this->session->cid.' AND POST_STATUS = 1) ORDER BY POST_AT DESC
								');
    	if ($res->num_rows() > 0) {
    		$data = $res->result();
    	}

    	$res->free_result();

    	return $data;
    }
}
?>