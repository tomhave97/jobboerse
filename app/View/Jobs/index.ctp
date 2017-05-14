<h1> Jobbörse </h1>

<?php echo $this->Html->link(
    'Job Hinzufügen',
    array('controller' => 'jobs', 'action' => 'add')
); ?>

<table>
    <tr>
        <th> Firma </th>
        <th> Bezeichnung </th>
        <th> Erstelldatum </th>
    </tr>

    <?php foreach($jobs as $job): ?>
    <tr> 
                   <!    // Titel  URL
                        // 1 Param/ 2 Param !>
        <td><?php echo $job['Job']['firma']; ?></td>
        <td>
        <?php echo $this->Html->link($job['Job']['bezeichnung'], 
        array('controller' => 'jobs', 'action' => 'view', $job['Job']['id'])); ?>
        </td>
        <td><?php echo $job['Job']['erstelldatum']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($job); ?>
</table>