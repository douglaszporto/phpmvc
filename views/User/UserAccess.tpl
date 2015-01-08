<script type="text/javascript">
{{include 'User/Header.tpl' assign=header}}
$('#login').html('{{$header|strip|escape:'quotes'}}');
General.LinkEvents();
</script>