
<link rel="stylesheet" type="text/css" href="<?php echo $theme_css_url."ee_debug_toolbar.css" ?>">

<?php foreach($panels AS $key => $panel): ?>
	<?php foreach($panel->getCss() AS $css): ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>">
	<?php endforeach; ?>
<?php endforeach; ?>

<div id="EEDebug_debug">
	<?php foreach($panels AS $key => $panel): ?>
		<br />
		<?php if($panel->getAjaxUrl() != ''): ?>
		<div id="<?php echo $panel->getTarget(); ?>" class="EEDebug_panel height-6x">
			<?php //echo $panel->getAjaxUrl(); ?>
			EEDebug_<?php echo $panel->getName(); ?>_canvas
			<input type="hidden" id="EEDebug_<?php echo $panel->getName(); ?>_panel_url" name="EEDebug_<?php echo $panel->getName(); ?>_panel_url" value="<?php echo $panel->getAjaxUrl(); ?>" />
			<div id="EEDebug_<?php echo $panel->getName(); ?>_canvas"></div>
		</div>
		<?php else: ?>
			<?php echo $panel->getOutput(); ?>
		<?php endif; ?>
	<?php endforeach; ?>
	<div id="EEDebug_info">
		<?php foreach($panels AS $key => $panel): ?>
		<span class="EEDebug_span clickable <?php echo $panel->getPanelCss(); ?>" data-target="<?php echo $panel->getTarget(); ?>">
			<img src="<?php echo $panel->getButtonIcon(); ?>" style="vertical-align:middle"
				 alt="<?php echo $panel->getButtonIconAltText(); ?>" title="<?php echo $panel->getButtonlabel(); ?>">
				<?php echo $panel->getButtonLabel(); ?>
		</span>
		<?php endforeach; ?>
		<span class="EEDebug_span EEDebug_last clickable" id="EEDebug_toggler">&#171;</span>
	</div>
</div>

<script type="text/javascript">
	window.EEDebug = {data:{}, config:{}};
	window.EEDebug.config.template_debugging_enabled = <?php if($template_debugging_enabled){ echo "true"; }else{ echo "false";}?>;
	window.EEDebug.data.tmpl_data = <?php echo $template_debugging_chart_json?>;
</script>
<script src="<?php echo $theme_js_url . "ee_debug_toolbar.js" ?>" type="text/javascript"
		charset="utf-8" defer id="EEDebug_debug_script"></script>
<?php foreach($panels AS $key => $panel): ?>
	<?php foreach($panel->getJs() AS $js): ?>
	<script src="<?php echo $js; ?>" type="text/javascript" charset="utf-8" defer id="EEDebug_debug_script"></script>
	<?php endforeach; ?>
<?php endforeach; ?>		
<?php echo $extra_html; ?>