{$this->Form->select('sssss', $select1)}
<a href="admin/users/login" rel="prettyPopin">ポップアップ！</a>
<div id="datetimepicker1" class="input-append">
	<input type="text"/>
	<span class="add-on">
		<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
	</span>
</div>
	{$this->Html->css('bootstrap-datetimepicker')}
	{$this->Html->script('moment')}
	{$this->Html->script('bootstrap-datetimepicker.min')}
	{$this->Html->script('bootstrap-datetimepicker-ja')}
<script type="text/javascript">
<!--
$(document).ready(function(){
    $('#datetimepicker1').datetimepicker({
      language: 'ja',
	  format : 'yyyy/MM/dd hh:mm:ss',
      pick12HourFormat: true
    });
});
// -->
</script>