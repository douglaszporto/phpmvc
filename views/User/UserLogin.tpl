{{if $message != ''}}
<div class="error center">
	{{$message}}
</div>
{{/if}}

<div class='center' id="login-form">
	{{include 'User/UserForm.tpl'}}
	<br clear="all" />
</div>
