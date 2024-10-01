<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous">
</script>
<script src="../js/materialize.min.js"></script>
<script src="../js/sweetalert2.js"></script>
<script>
    $('#buscar').keyup(function(event) {

        var contenido = new RegExp($(this).val(), 'i');
        $('tr').hide();
        $('tr').filter(function() {
            return contenido.test($(this).text());
        }).show();
        $('cabecera').attr('style', '');

    });








    $('.button-collpase').sideNav();
    $('select').material_select();

    function may(obj, id) {
        obj = obj.toUpperCase();
        document.getElementById(id).value = obj;
    }
</script>