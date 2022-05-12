


 <!-- jQuery -->
    <script src="<?= base_url(); ?>vendor/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url(); ?>vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="<?= base_url(); ?>vendor/adminlte/dist/js/adminlte.js"></script>
   <!-- Datatables -->
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
      <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#laporanAset').DataTable({
                dom: 'Blfrtip',
                  buttons: [
                     { extend: 'excel', className: 'btn btn-sm btn-success mb-2' },
                     // { extend: 'pdf', className: 'btn btn-sm btn-warning mb-2' },
                     { extend: 'print', className: 'btn btn-sm btn-secondary mb-2' }
                     ]
            });
         } );
</script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="<?= base_url(); ?>vendor/adminlte/plugins/chart.js/Chart.min.js"></script>
    <script src="<?= base_url(); ?>vendor/adminlte/dist/js/demo.js"></script>
    <script src="<?= base_url(); ?>vendor/adminlte/dist/js/pages/dashboard3.js"></script>
     <!-- Script input -->
    <script>
   $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
   });
</script>

