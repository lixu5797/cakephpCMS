<div class="schedules index">
	<h2>{__('Schedules')}</h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th>{$this->Paginator->sort('id')}</th>
			<th>{$this->Paginator->sort('title')}</th>
			<th>{$this->Paginator->sort('name')}</th>
			<th>{$this->Paginator->sort('start_time')}</th>
			<th>{$this->Paginator->sort('end_time')}</th>
			<th>{$this->Paginator->sort('created')}</th>
			<th>{$this->Paginator->sort('modified')}</th>
			<th class="actions">{__('Actions')}</th>
	</tr>
	</thead>
	<tbody>
	{foreach from=$schedules item=schedule}
	<tr>
		<td>{h($schedule['Schedule']['id'])}&nbsp;</td>
		<td>{h($schedule['Schedule']['title'])}&nbsp;</td>
		<td>{h($schedule['Schedule']['name'])}&nbsp;</td>
		<td>{h($schedule['Schedule']['start_time'])}&nbsp;</td>
		<td>{h($schedule['Schedule']['end_time'])}&nbsp;</td>
		<td>{h($schedule['Schedule']['created'])}&nbsp;</td>
		<td>{h($schedule['Schedule']['modified'])}&nbsp;</td>
		<td class="actions">
			{$this->Html->link(__('View'), ['action' => 'view', $schedule['Schedule']['id']])}
			{$this->Html->link(__('Edit'), ['action' => 'edit', $schedule['Schedule']['id']])}
			{$this->Form->postLink(__('Delete'), ['action' => 'delete', $schedule['Schedule']['id']], ['confirm' => __('Are you sure you want to delete # %s?', $schedule['Schedule']['id'])])}
		</td>
	</tr>
	{/foreach}
	</tbody>
	</table>
	<p>
	{$this->Paginator->counter([
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	])}
	</p>
	<div class="paging">
	{$this->Paginator->prev(__('< previous'), [], null, ['class' => 'prev disabled'])}
	{$this->Paginator->numbers(['separator' => ''])}
	{$this->Paginator->next(__('next >'), [], null, ['class' => 'next disabled'])}
	</div>
</div>
<div class="actions">
	<h3>{__('Actions')}</h3>
	<ul>
		<li>{$this->Html->link(__('New Schedule'), ['action' => 'add'])}</li>
	</ul>
</div>
