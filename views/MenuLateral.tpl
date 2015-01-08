
<div id="menu-anchor">
	 Menu <span>&#xf054;</span>
</div>	

<ul class="sidemenu" >
	{{foreach $menu as $grupo}}
		
		{{if !empty($grupo@key)}}

			<li class="sidemenu-group">
				<a href="{{$domain}}/{{$grupo.link}}">
					{{if $grupo@key|strpos:'ProfitChart' !== false}}
						{{'ProfitChart'|str_replace:'<b>Profit</b>Chart<span class="trademark">®</span>':$grupo@key}}
					{{else}}
						{{$grupo@key}}
					{{/if}}
				</a>
			</li>

		{{/if}}

		{{if $grupo.open}}

			{{foreach $grupo.items as $item}}
				<li class="sidemenu-item {{if $request_path|strpos:$item !== false}}selected{{/if}}"><a href="{{$domain}}/{{$item}}">{{$item@key}}</a></li>
			{{/foreach}}

		{{/if}}

	{{/foreach}}
</ul>
