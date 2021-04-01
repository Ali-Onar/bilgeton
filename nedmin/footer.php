<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="pull-right hidden-xs">
    İletişim: 0555 555 5555
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2021 <a href="#">Bilgeton CMS</a>.</strong> Tüm hakları saklıdır.
</footer>


<!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Jquery UI - Sürükle Bırak -->
<script src="bower_components/jquery-ui/jquery-ui.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>



<!-- Tablo Özellikleri -->
<script type="text/javascript">
  $(function() {
    $('#example1').DataTable()
  })
</script>

<!-- Jquery UI - Sürükle Bırak -->
<script type="text/javascript">
  $(function() {
    $("#sortable").sortable({
      revert: true,
      handle: ".sortable",
      stop: function(event, ui) {
        var data = $(this).sortable('serialize');

        $.ajax({
          type: "POST",
          dataType: "json",
          data: data,
          url: "netting/orderAjax.php?admins_must=true",
          success: function(msg) {
            if (msg.processResult) {
              alert("sıralama başarılı");
            } else {
              alert("hata var");
            }
          }
        });
      }
    });
    $("#sortable").disableSelection();
  });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>