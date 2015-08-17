<div class="users form">
{$this->Form->create('User')}
    <fieldset>
        <legend>{__('Add User')}</legend>
        {$this->Form->input('username')}
        {$this->Form->input('mail_adress')}
        {$this->Form->input('password')}
		{$this->Form->select('role', $options)}
    </fieldset>
{$this->Form->end(__('Submit'))}
</div>