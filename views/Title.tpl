<div id="title-bar">
	<h1 class="center">{{$title}}</h1>
</div>
<div id="breadcrumb">
	<div class="center">
		<ul>
		{{foreach $breadcrumb as $b}}
			<li><a href="{{$b}}" title="{{$b@key}}">{{$b@key}}</a></li>
			<li><span class='breadcrumb-space'>&#xf105;</span></li>
		{{/foreach}}
		</ul>
		<br clear="all" class=""/>
	</div>
	
</div>