<div class="container">
<footer id="footer" class="text-secondary">
        <div class="row">
          <div class="col-lg-12">

            <ul class="list-unstyled float-lg-right">
              <li><a href="#top">Back to top</a></li>
              
            </ul>
            <p>&copy; 2020-2021 OJT-PMESDA</p>
            <p>All Rights Reserved</p>
          </div>
        </div>

      </footer>
</div>

    </div>

        <?php
  $this->db->select_sum('ojt_hours');
  $this->db->where('student_username', 'mariella01');
  $data = $this->db->get('students_dtr');
  foreach ($data->result() as $row) {
      $hours = $row->ojt_hours;
  }

  $this->db->where('ojt_hours !=', 0);
  $this->db->where('student_username', 'mariella01');
  $attended = $this->db->count_all_results('students_dtr');
 
  $this->db->where('ojt_hours', 0);
  $this->db->where('student_username', 'mariella01');
  $absent = $this->db->count_all_results('students_dtr');
?>

    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/form_wizard.js"></script>

    <script>
       $(document).ready(function() {
        $('#email').change(function(){
          var email = $('#email').val();
          if (email != '') 
          {
            $.ajax({
              url:"<?php echo base_url(); ?>Students/check_email_availability",
              method:"POST",
              data: {email:email},
              success:function(data){
                $('#email_result').html(data);
              }

            });
          }
        });
       });
    </script>

    <script type="text/javascript">
    $(".btn").on("click", function (event) {         
            if ($(this).hasClass("disabled")) {
                event.stopPropagation()
            } else {
                $('#applyRemoveDialog').modal("show");
            }
        });
  </script>

 <script>
   var ctx = document.getElementById('myData').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Total Hours Attended', 'Total Days Attended', 'Total Absent'],
        datasets: [{
            label: 'OJT Hours',
            data: [<?php echo $hours; ?>, <?php echo $attended; ?>, <?php echo $absent; ?>],
            backgroundColor: [
                'rgba(52, 152, 219)',
                'rgba(46, 204, 113)',
                'rgba(231, 76, 60)'
            ],
            borderWidth: 2,
            hoverBorderWidth: 5,
        }]
    },
    options: {
    }
});
 </script>

 <script>
   var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Hours', 'Absent', 'Attended', 'Holidays'],
        datasets: [{
            label: '# of Votes',
            data: [62, 3, 40, 3],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
    }
});
 </script>

  </body>
</html>