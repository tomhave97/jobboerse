<h1> Add Post </h1>
<?php
echo $this->Form->create('Job');
echo $this->Form->input('firma');
echo $this->Form->input('bezeichnung');
echo $this->Form->input('beschreibung');
echo $this->Form->input('kurzbeschreibung');
echo $this->Form->input('ort');
echo $this->Form->input('gehalt');
echo $this->Form->input('anforderungen');
echo $this->Form->input('bieten');
echo $this->Form->input('email');
$token = uniqid();
echo $this->Form->hidden( 'token', array( 'value' => $token));           
echo $this->Form->end('Job Erstellen');

