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
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/global.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/form_wizard.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/evaluate.js"></script>

    <script>
       $(document).ready(function() {
        $('#email').change(function(){
          var email = $('#email').val();
          if (email != '') 
          {
            $.ajax({
              url:"<?php echo base_url(); ?>availability",
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

  </body>
</html>