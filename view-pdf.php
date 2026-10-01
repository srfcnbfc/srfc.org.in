<!DOCTYPE html>
<html>
<body style="margin:0">
  <iframe src="" id="pdfFrame" width="100%" height="100vh"></iframe>

  <script>
    const params = new URLSearchParams(window.location.search);
    document.getElementById('pdfFrame').src = params.get('file');
  </script>
</body>
</html>
