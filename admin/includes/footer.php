<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    Anything you want
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= $url; ?>/admin/assets/js/jquery.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= $url; ?>/admin/assets/js/bootstrap.bundle.js"></script>
<!-- AdminLTE App -->
<script src="<?= $url; ?>/admin/assets/js/adminlte.js"></script>
</body>

<!-- upload  image  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#showImage')
          .attr('src', e.target.result)
          .width(300)
          .height(150);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>



{{-- sweet alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
<script>
  $(document).on("click", '#delete', function(e) {
    e.preventDefault();
    var link = $(this).attr("href");
    swal({
        title: "Are you sure you want to delete ?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = link;
        } else {
          swal("Your imaginary file is safe!");
        }
      });
  });
</script>



</html>