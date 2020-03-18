<div class="container">
	<div class="row">
		<div class="col-md-6">
        <?php foreach ($fetch_data->result() as $row) {
            echo '<img src="'.base_url().'assets/images/'.$row->user_image.'" class="rounded-circle" width="150px">';
            echo '<legend>'.$row->name.' | Overall Rating: 100</legend>';
            $yow = $row->company;
            if(!empty($yow))
            {
                $this->db->where('id', $yow);
                $data = $this->db->get('admin');
                foreach ($data->result() as $key) {
                    echo '<small class="text-info">'.$key->company_name.' | </small>';
                    echo '<small>'.$key->address.' | </small>';
                    echo '<small>03-09-2020</small>';
                }
            }
            else{
                echo '<legend>No Data Found</legend>';
            }
            echo '<img src="'.base_url().'assets/images/'.$key->user_image.'" class="rounded-circle" width="50px">';
        }
        ?>
			<canvas id="myData" width="400" height="400"></canvas>
            <canvas id="myChart" width="400" height="400"></canvas>
		</div>
        <div class="col-md-6">
            <legend>I. Quality  and Quantity  of Work (40%)</legend>
            <table class="table table-responsive">
                <thead class="table-success">
                <tr>
                  <th scope="col">Description</th>
                  <th scope="col">Grades</th>
                </tr>
              </thead>
                <tbody>
                    <tr>
                        <td>Ability to Performed the Assigned Work well</td>
                        <td>98</td>
                    </tr>
                    <tr>
                        <td>Accuracy of work</td>
                        <td>90</td>
                    </tr>
                    <tr>
                        <td>Volume of work accomplished</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <th class="text-danger">Average</th>
                        <th class="text-danger">100</th>
                    </tr>
                </tbody>
            </table>
            <legend>II. Knowledge of Work (40%)</legend>
                <table class="table table-responsive">
                    <thead class="bg-success" style="color: #fff;">
                    <tr>
                      <th scope="col">Description</th>
                      <th scope="col">Grades</th>
                    </tr>
                  </thead>
                    <tbody>
                        <tr>
                            <td>Knowledge of the Basic Principle Neccessary for the Accomplishment of assigned Work</td>
                            <td>98</td>
                        </tr>
                        <tr>
                            <td>Extent of Knowledge with regards to Department Operations</td>
                            <td>90</td>
                        </tr>
                        <tr>
                            <td>Ability to follow Instructions</td>
                            <td>100</td>
                        </tr>
                        <tr>
                        <th class="text-danger">Average</th>
                        <th class="text-danger">100</th>
                    </tr>
                    </tbody>
                </table>
            <legend>III. Work Habits and Personality (20%)</legend>
                <table class="table table-responsive">
                    <thead class="bg-success" style="color: #fff;">
                    <tr>
                      <th scope="col">Description</th>
                      <th scope="col">Grades</th>
                    </tr>
                  </thead>
                    <tbody>
                        <tr>
                            <td>Punctuality</td>
                            <td>98</td>
                        </tr>
                        <tr>
                            <td>Attendance</td>
                            <td>90</td>
                        </tr>
                        <tr>
                            <td>Deportment/Behavior</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>Industry</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>Interested and Enthusiasm in the Performance of Work</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>Orderliness</td>
                            <td>100</td>
                        </tr>
                        <tr>
                        <th class="text-danger">Average</th>
                        <th class="text-danger">100</th>
                    </tr>
                    </tbody>
                </table>
            <legend class="text-danger">Remarks:</legend><legend>Very passionate and hardworking students. Keep It Up.</legend>
            <legend class="text-danger">Rated By:</legend><legend>John Ceazar Arellano, RN, MPA</legend>
            </div>
        </div>
	</div>
</div>
