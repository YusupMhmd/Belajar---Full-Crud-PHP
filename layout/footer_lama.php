
    
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    <!-- Plugin datatables JQuery -->
     <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
     <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
     <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>

     <!-- Plugin CDN Ckeditor -->
     <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>

      <script>
			CKEDITOR.replace('alamat', {
        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
        filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        height: '400px'
      });
      </script>

     <script>
        new DataTable('#table');
     </script>
  </body>
</html>