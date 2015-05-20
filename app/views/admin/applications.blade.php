<h2>Applications</h2>
<div class="applications-table">
	{{ Datatable::table()
		->addColumn('id','First name', 'Surname', 'Tel', 'Email', 'Matric', 'N2', 'ID', 'CV', 'Status', 'Date', 'Edit', 'Delete')    // these are the column headings to be shown
		->setUrl(route('api.applications'))
		->setOptions('aaSorting', array([10 ,"desc"]))
		->render() }}
</div>