<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller {

	function __construct() {
        parent::__construct();
    }

    public function ratings()
    {
        $this->load->model('Students_rating_model');
    	$results = $this->Students_rating_model->_getAllData(['studentID' => $this->uri->segment(2)]);

    	$rate = [];
    	$rate1 = [];
    	$rate2 = [];
    	foreach ($results as $k) {
			array_push($rate, [
				$k->rating_1,
				$k->rating_2,
				$k->rating_3
			]);
			array_push($rate1, [
				$k->rating_4,
				$k->rating_5,
				$k->rating_6
			]);
			array_push($rate2, [
				$k->rating_7,
				$k->rating_8,
				$k->rating_9,
				$k->rating_10,
				$k->rating_11,
				$k->rating_12
			]);
    	}

    	$quality = array_sum($rate);
    	$knowledge = array_sum($rate1);
    	$personality = array_sum($rate2);

    	$output = json_encode(['Quality' => $quality, 'Knowledge' => $knowledge, 'Personality' => $personality]);

    	echo $output;
    }

    public function attendance()
    {
        $this->load->model('Students_dtr_model');
    	$results = $this->Students_dtr_model->_getAllData(['studentID' => $this->uri->segment(2)]);

    	$rate = [];
    	$rate1 = [];
    	foreach ($results as $k) {

			if ($k->ojt_hours == 0) {
				array_push($rate, $k->ojt_hours);
			} else {
				array_push($rate1, $k->ojt_hours);
			}
    	}

    	slack(json_encode(['Attendance' => $rate1, 'Absent' => $rate], ENVIRONMENT, __FUNCTION__));

    	$attendance = count($rate1);
    	$absent = count($rate);

    	$output = json_encode(['Attendance' => $attendance, 'Absent' => $absent]);

    	echo $output;
    }
}