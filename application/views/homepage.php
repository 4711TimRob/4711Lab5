<div class="alert alert-warning alert-dismissable">
	<a = href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>
	There are <strong>{remaining_tasks}</strong> tasks left to do!</div>

<table class="table table-striped">
    <thead>
        <th>Id</th>
        <th>Task</th>
        <th>Priority</th>
    </thead>
    <tbody>
    	{display_tasks}
	    <tr>
		    <td>{id}</td>
		    <td>{task}</td>
		    <td>{priority}</td>
		</tr>
		{/display_tasks}
	</tbody>
</table>

