<!--===== MAIN JS =====-->
<script src="assets/js/main.js"></script>
<script src="./assets/js/snackbar.js"></script>
<script>
function myFunction() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
}
</script>
</body>

</html>