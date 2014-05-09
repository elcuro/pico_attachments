pico_attachments
===================================

A PicoCMS plugin for showing attachments

#### Config
Default extensions for attachments are `'jpg', 'doc', 'pdf'`
You can add your own extension in `Config.php`
	
	$config['attachments_extension'] => array('jpg', 'doc', 'pdf', '...');

#### Usage
Your Pico app should have structure like this

	/sub/index.md
	/sub/sub1/index.md
	...

*Please note: Usage of multiple .md files in folder will cause that attachments will be showed for every .md file in folder*

Copy your attachments to folder of your needs.

Show attachments in your template 

````html
<h3>Attachments</h3>
<ul>
{% for file in attachments %}
	<li>
		<a href="{{ base_url }}{{ file.rel_path }}"> {{ file.basename }} ({{ file.size }} bytes)</a>
	</li>
{% endfor %}
</ul>
````
