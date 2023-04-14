<form method="post" action="">
	<div class="panel-body" style="font-family: Franklin Gothic Medium;text-transform: uppercase;color: #9f9f9f;">Настройки плагина</div>
	<div class="table-responsive">
	<table class="table table-striped">
      <tr>
        <td class="col-xs-9 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Мета Robots домашней страницы?</h6>
		  <span class="text-muted text-size-small hidden-xs">главная страница сайта</span>
		</td>
        <td class="col-xs-1 col-md-1">
			<select name="robo_main">{{ robo_main }}</select>
        </td>
        <td class="col-xs-12 col-md-12">
			{{ meta_main }}
        </td>
      </tr>
      <tr>
        <td class="col-xs-9 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Мета Robots поиска и результатов поиска?</h6>
		  <span class="text-muted text-size-small hidden-xs">поиск и результаты поиска</span>
		</td>
        <td class="col-xs-1 col-md-1">
			<select name="robo_search">{{ robo_search }}</select>
        </td>
        <td class="col-xs-12 col-md-12">
			{{ meta_search }}
        </td>
      </tr>
      <tr>
        <td class="col-xs-9 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Мета Robots для восстановления пароля?</h6>
		  <span class="text-muted text-size-small hidden-xs">восстановления пароля</span>
		</td>
        <td class="col-xs-1 col-md-1">
			<select name="robo_lostpas">{{ robo_lostpas }}</select>
        </td>
        <td class="col-xs-12 col-md-12">
			{{ meta_lostpas }}
        </td>
      </tr>
      <tr>
        <td class="col-xs-9 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Мета Robots при регистрации на сайте?</h6>
		  <span class="text-muted text-size-small hidden-xs">регистрация нового пользователя</span>
		</td>
        <td class="col-xs-1 col-md-1">
			<select name="robo_registr">{{ robo_registr }}</select>
        </td>
        <td class="col-xs-12 col-md-12">
			{{ meta_registr }}
        </td>
      </tr>
      <tr>
        <td class="col-xs-9 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Мета Robots просмотра новостей?</h6>
		  <span class="text-muted text-size-small hidden-xs">публикации сайта</span>
		</td>
        <td class="col-xs-1 col-md-1">
			<select name="robo_news">{{ robo_news }}</select>
        </td>
        <td class="col-xs-12 col-md-12">
			{{ meta_news }}
        </td>
      </tr>
      <tr>
        <td class="col-xs-9 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Мета Robots статистических страниц?</h6>
		  <span class="text-muted text-size-small hidden-xs">статистические страницы сайта</span>
		</td>
        <td class="col-xs-1 col-md-1">
			<select name="robo_static">{{ robo_static }}</select>
        </td>
        <td class="col-xs-12 col-md-12">
			{{ meta_static }}
        </td>
      </tr>
      <tr>
        <td class="col-xs-9 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Мета Robots категорий?</h6>
		  <span class="text-muted text-size-small hidden-xs">активировать Мета Robots макрос страницы пагинации для категорий и подкатегорий?</span>
		</td>
        <td class="col-xs-1 col-md-1">
			<select name="robo_cat">{{ robo_cat }}</select>
        </td>
        <td class="col-xs-12 col-md-12">
			{{ meta_cat }}
        </td>
      </tr>
      <tr>
        <td class="col-xs-9 col-sm-6 col-md-7">
		  <h6 class="media-heading text-semibold">Мета Robots облако тегов?</h6>
		  <span class="text-muted text-size-small hidden-xs">Активировать Мета Robots макрос при просмотре тегов?</span>
		</td>
        <td class="col-xs-1 col-md-1">
			<select name="robo_tags">{{ robo_tags }}</select>
        </td>
        <td class="col-xs-12 col-md-12">
			{{ meta_tags }}
        </td>
      </tr>
	</table>
	</div>

	<div class="panel-footer" align="center">
		<button type="submit" name="submit" class="btn btn-outline-primary">Сохранить</button>
	</div>
</form>