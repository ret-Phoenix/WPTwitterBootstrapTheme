<?php

include('helper-forms.php');

class ControlPanel {
// Устанавливаем значения по умолчанию
	var $default_settings = array(
		'phone' => '495 122-12-12',
		'email' => 'info@site.ru',
		
		'widgets-footer-count-row-1' => 1,
		'widgets-footer-count-row-1' => 3,

		'show-thumb' => '',
		'show-tags' => '',
		'show-rubrics' => '',
		'show-author' => '',
		'show-slider-top' => '',
		'show-slider-content' => '',
		);
	var $options;

	function ControlPanel() {
		add_action('admin_menu', array(&$this, 'add_menu'));
		if (!is_array(get_option('savage-tw-bt-theme'))) {
			add_option('themadmin', $this->default_settings);
		}
		$this->options = get_option('savage-tw-bt-theme');
	}

	function add_menu() {
		add_theme_page('WP Theme Options', 'Опции темы', 8, "themadmin", array(&$this, 'optionsmenu'));
	}

 // Сохраняем значения формы с настройками 
	function optionsmenu() {
		if ($_POST['ss_action'] == 'save') {
			$this->options["phone"] = $_POST['cp_phone'];
			$this->options["email"] = $_POST['cp_email'];
			$this->options["facebook"] = $_POST['cp_facebook'];
			$this->options["vkontakte"] = $_POST['cp_vkontakte'];
			$this->options["twitter"] = $_POST['cp_twitter'];
			$this->options["metrika"] = $_POST['cp_metrika'];


			$this->options["widgets-footer-count-row-1"] = $_POST['widgets-footer-count-row-1'];
			$this->options["widgets-footer-count-row-2"] = $_POST['widgets-footer-count-row-2'];
			$this->options["show-thumb"] = $_POST['show-thumb'];
			$this->options["show-tags"] = $_POST['show-tags'];
			$this->options["show-rubrics"] = $_POST['show-rubrics'];
			$this->options["show-author"] = $_POST['show-author'];
			$this->options["show-slider-top"] = $_POST['show-slider-top'];
			$this->options["show-slider-content"] = $_POST['show-slider-content'];

			// update_option('savage-widgets-footer-count', $_POST['widgets-footer-count']);
			
			update_option('savage-tw-bt-theme', $this->options);
			echo '<div class="updated fade" id="message" style="background-color: rgb(255, 251, 204); width: 400px; margin-left: 17px; margin-top: 17px;"><p>Ваши изменения <strong>сохранены</strong>.</p></div>';
		}
 // Создаем форму для настроек
		echo '<form action="" method="post" class="themeform">';
		echo '<input type="hidden" id="ss_action" name="ss_action" value="save">';

		print '<div class="cptab"><br />
		<b>Настройки темы</b>
		<br />
		<h3>Контакты</h3>
		<p><input placeholder="Телефон" style="width:300px;" name="cp_phone" id="cp_phone" value="'.$this->options["phone"].'"><label> - телефон</label></p>
		<p><input placeholder="Email" style="width:300px;" name="cp_email" id="cp_email" value="'.$this->options["email"].'"><label> - email</label></p>
		<h3>Социальные сети</h3>
		<p><input placeholder="Ссылка на страницу facebook" style="width:300px;" name="cp_facebook" id="cp_facebook" value="'.$this->options["facebook"].'"><label> - facebook</label></p>
		<p><input placeholder="Ссылка на страницу vkontakte" style="width:300px;" name="cp_vkontakte" id="cp_vkontakte" value="'.$this->options["vkontakte"].'"><label> - vkontakte</label></p>
		<p><input placeholder="Ссылка на страницу twitter" style="width:300px;" name="cp_twitter" id="cp_twitter" value="'.$this->options["twitter"].'"><label> - twitter</label></p>

		<h3>Код в footer.php</h3>
		<p><textarea placeholder="Здесь можно прописать коды счетчиков или дополнительных скриптов" style="width:300px;" name="cp_metrika" id="cp_metrika">'.stripslashes($this->options["metrika"]).'</textarea><label> - здесь можно прописать коды счетчиков или дополнительных скриптов</label></p>

		</div><br />';

		// echo '<p><label>Виджетов в футере: <input placeholder="Виджетов в футере" style="width:300px;" name="widgets-footer-count" id="widgets-footer-count" value="'.$this->options["widgets-footer-count"].'"></label></p>';

		$ar_columns = array(1,2,3,4);

		// echo '<pre>';
		// print_r($this->options);
		// echo '</pre>';

		echo '<p><label>Виджетов в футере (1 стр.): '.form_combo_simple('widgets-footer-count-row-1', $this->options["widgets-footer-count-row-1"], $ar_columns).'</label></p>';
		echo '<p><label>Виджетов в футере (2 стр.): '.form_combo_simple('widgets-footer-count-row-2', $this->options["widgets-footer-count-row-2"], $ar_columns).'</label></p>';
		echo '<p>'.form_checkbox('Отображать миниатюры', 'show-thumb', $this->options["show-thumb"]).'</p>';
		echo '<p>'.form_checkbox('Отображать метки', 'show-tags', $this->options["show-tags"]).'</p>';
		echo '<p>'.form_checkbox('Отображать рубрики', 'show-rubrics', $this->options["show-rubrics"]).'</p>';
		echo '<p>'.form_checkbox('Отображать Автора и время', 'show-author', $this->options["show-author"]).'</p>';
		echo '<p>'.form_checkbox('Отображать слайдер сверху', 'show-slider-top', $this->options["show-slider-top"]).'</p>';
		echo '<p>'.form_checkbox('Отображать слайдер контента', 'show-slider-content', $this->options["show-slider-content"]).'</p>';
		echo '<input type="submit" value="Сохранить" name="cp_save" class="dochanges" />';
		echo '</form>';
	}
}
$cpanel = new ControlPanel();
$mytheme = get_option('themadmin');
?>