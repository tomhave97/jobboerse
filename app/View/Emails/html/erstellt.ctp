<html>
    <h1> Wir haben ihren Job erfolgreich erstellt </h1>
    <p> Danke das sie sich entschieden haben über uns 
        Ihre neuen Mitarbeiter zu finden </p>
    <p> Bei änderungswünschen oder falls sie ihre Jobausschreibung löschen wollen 
        folgen sie bitte folgendem 
        <?php 
        echo $this->Html->link('Link', array('controller' => 'jobs', 'action' => 'edit', $token));
         ?>
        </p> 
</html>