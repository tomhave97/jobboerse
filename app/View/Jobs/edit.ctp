<h1> Edit Job </h1>
<?php
echo $this->Form->create('Job');
echo $this->Form->input('firma' );
echo $this->Form->input('bezeichnung');
echo $this->Form->input('beschreibung');
echo $this->Form->input('kurzbeschreibung');
echo $this->Form->input('ort');
echo $this->Form->input('gehalt');
echo $this->Form->input('anforderungen');
echo $this->Form->input('bieten');
echo $this->Form->input('email');
echo $this->Form->end('Änderungen Speichern');
echo $this->Html->link( 'Job Löschen' , array('controller' => 'jobs', 'action' => 'delete', 'class' => 'button', $job['Job']['token']));

?>


