<div class="stickers stickers-info stickers-styled-left">
<b>Использования директив</b><br><br>
<b>all</b> - индексировать и переходить по ссылкам (соответствует директивам index и follow) разрешено индексировать текст и ссылки на странице.<br />
<b>index, nofollow</b> - индексировать текст, но не переходить по ссылкам на странице (Робот не перейдет по ссылкам при обходе сайта, но может узнать о них из других источников. Например, на других страницах или сайтах.).<br />
<b>noindex, follow</b> - не индексировать текст, но переходить по ссылкам.<br />
<b>index, follow</b> - индексировать текст и переходить по ссылкам.<br />
<b>noindex, nofollow</b> - не индексировать текст и не переходить по ссылкам.<br />
<b>none</b> - не индексировать и не переходить по ссылкам (соответствует директивам noindex, nofollow).<br />
</div>
<br>
<div class="panel panel-default">
	<div class="panel-heading">{{global}}
		<div class="panel-head-right">{{header}}</div>
	</div>
		{{entries}}
</div>