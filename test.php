<?php

$data = unserialize('a:3:{s:6:"module";a:62:{s:13:"admin_toolbar";i:0;s:19:"admin_toolbar_tools";i:0;s:14:"automated_cron";i:0;s:5:"block";i:0;s:13:"block_content";i:0;s:9:"blocktabs";i:0;s:10:"breakpoint";i:0;s:8:"calendar";i:0;s:17:"calendar_datetime";i:0;s:7:"captcha";i:0;s:8:"ckeditor";i:0;s:5:"color";i:0;s:8:"colorbox";i:0;s:7:"comment";i:0;s:6:"config";i:0;s:7:"contact";i:0;s:10:"contextual";i:0;s:8:"datetime";i:0;s:5:"dblog";i:0;s:18:"dynamic_page_cache";i:0;s:6:"editor";i:0;s:16:"empty_front_page";i:0;s:5:"field";i:0;s:8:"field_ui";i:0;s:4:"file";i:0;s:6:"filter";i:0;s:11:"geolocation";i:0;s:4:"help";i:0;s:7:"history";i:0;s:5:"image";i:0;s:13:"image_captcha";i:0;s:5:"jssor";i:0;s:13:"jssor_example";i:0;s:9:"libraries";i:0;s:4:"link";i:0;s:7:"menu_ui";i:0;s:4:"node";i:0;s:7:"options";i:0;s:10:"page_cache";i:0;s:4:"path";i:0;s:9:"quickedit";i:0;s:3:"rdf";i:0;s:9:"recaptcha";i:0;s:6:"search";i:0;s:8:"shortcut";i:0;s:18:"social_media_links";i:0;s:6:"system";i:0;s:8:"taxonomy";i:0;s:4:"text";i:0;s:7:"toolbar";i:0;s:4:"tour";i:0;s:6:"update";i:0;s:4:"user";i:0;s:17:"video_embed_field";i:0;s:15:"views_slideshow";i:0;s:21:"views_slideshow_cycle";i:0;s:15:"views_templates";i:0;s:8:"views_ui";i:0;s:5:"forum";i:1;s:17:"menu_link_content";i:1;s:5:"views";i:10;s:8:"standard";i:1000;}s:5:"theme";a:5:{s:6:"stable";i:0;s:6:"classy";i:0;s:6:"bartik";i:0;s:5:"seven";i:0;s:6:"zircon";i:0;}s:5:"_core";a:1:{s:19:"default_config_hash";s:43:"m2GVq11UAOVuNgj8x0t5fMOPujpvQQ_zxLoaly1BMEU";}}' );

echo '<pre>';
var_dump($data);
echo '</pre>';

unset($data['module']['captcha']);  
unset($data['module']['image_captcha']);  
unset($data['module']['recaptcha']);  

echo '<pre>';
var_dump($data);
echo '</pre>';

echo (serialize($data));  




?>