<footer class="footer">
    <div class="space-footer" onclick="goBack()">
        <i class="icofont-reply"></i>
        Voltar
    </div>
    <div class="space-footer" id="space-footer-home">
        <i class="icofont-ui-home"></i>
        Home
    </div>
    <div class="space-footer" id="space-footer-menu">
        <i class="icofont-navigation-menu"></i>
        Menu  
    </div>
</footer>
<script src="assets/js/app.js"></script>
</body>
</html>
<script type="text/javascript">
    document.getElementById("space-footer-home").onclick = function () {
        location.href = "Home.php";

    };

    //toggle class
    $( "#space-footer-menu" ).click(function() {
      if($("#sidenavmod").hasClass("sidenav-mod"))  {
        $("#sidenavmod").removeClass('sidenav-mod');
        $("#sidenavmod").addClass('sidenav');
      } else{
        $("#sidenavmod").removeClass('sidenav');
        $("#sidenavmod").addClass('sidenav-mod');
      }
    });
</script>