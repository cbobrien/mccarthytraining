<h2>Enquiries</h2>

 {{ Datatable::table()
    ->addColumn('id','First name', 'Surname', 'Email', 'Tel', 'Questions', 'Date', 'View', 'Delete')
    ->setUrl(route('api.enquiries'))
    ->setOptions('aaSorting', array([6 ,"desc"]))
    ->render() }}