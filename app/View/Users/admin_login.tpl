<div class="users form">
{$this->Session->flash('auth')}
{$this->Form->create('User')}
    <fieldset>
        <legend>{__('Please enter your username and password')}</legend>
        {$this->Form->input('username')}
        {$this->Form->input('password')}
    </fieldset>
{$this->Form->end(__('Login'))}
</div>
<script type="text/javascript" language="JavaScript">
<!--
parent.Shadowbox.close();//シャドーボックスを閉じる
// -->
</script>
