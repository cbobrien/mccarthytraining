<?php

class AdminController extends BaseController {
	
	protected $layout = 'layouts.admin';

	public function __construct() {
		$this->beforeFilter('auth');
	}	

	public function showEnquiries() {
		$this->layout->content = View::make('admin.enquiries');
	}

	public function ajaxEnquiries() {		
		return Datatable::collection(Enquiry::all())		
	        ->showColumns('id', 'firstname', 'surname', 'tel', 'email', 'questions', 'created_at')
	        ->addColumn('email', function($model) {
	        	 return '<a href="mailto:' . $model->email .'">' . $model->email . '</a>';
	        })
	        ->addColumn('created_at', function($model) {
	        	 return '<div class="date">' . $model->created_at . '</div>';
	        })         
	        ->addColumn('Edit', function($model) {
	        	return '<a href="/admin/enquiry/edit/' . $model->id  .'" class="button info button-smaller view">View</a>';
	        })
	        ->addColumn('Delete', function($model) {
	        	return '<form method="POST" action="/admin/enquiry/delete/' . $model->id .'" onsubmit="return confirm(\'Are you sure you want to delete this enquiry?\');">
	        				<input name="_method" type="hidden" value="DELETE">
	        				<input class="button alert button-smaller delete" type="submit" value="Delete">
	        			</form>'; 
	        })
	        ->searchColumns('firstname', 'surname', 'tel', 'email', 'created_at')
	        ->orderColumns('id','firstname', 'surname', 'tel', 'email', 'questions', 'created_at', 'Edit', 'Delete')
	        ->make();
	}

	public function showEditEnquiry($id) {
		$enquiry = Enquiry::find($id);
        if(is_null($enquiry)) {
            return Redirect::route('admin.enquiries');
        }
		$this->layout->content = View::make('admin.enquiry-edit', compact('enquiry'));
	}

	public function updateEditEnquiry($id) {
		// $enquiry = Enquiry::find($id);
		// if(is_null($enquiry)) {
  //           return Redirect::route('admin.enquiries');
  //       }
		// $enquiry->save();
		return Redirect::route('admin.enquiries', $id);
	}

	public function deleteEnquiry($id) {				
        Enquiry::find($id)->delete();
        return Redirect::route('admin.enquiries')->with('message', 'Enquiry deleted');
    }

	public function showApplications() {
		$this->layout->content = View::make('admin.applications');
	}

	public function ajaxApplications() {	
		//return Datatable::collection(Application::all())
		return Datatable::collection(Application::orderBy('created_at', 'ASC')->get())
		//return Datatable::collection(DB::table('applications')->orderBy('created_at', 'desc')->get())						
	        ->showColumns('id', 'firstname', 'surname', 'tel', 'email', 'matric_path', 'n2_path', 'id_path', 'cv_path', 'status', 'created_at')
	        ->addColumn('email', function($model) {
	        	 return '<a href="mailto:' . $model->email .'">' . $model->email . '</a>';
	        })
	        ->addColumn('matric_path', function($model) {
	        	 return trim($model->matric_path) != '' ? '<a href="' . $model->matric_path .'" class="matric">Matric</a>' : '';
	        })
	        ->addColumn('n2_path', function($model) {
	        	 return trim($model->n2_path) != '' ? '<a href="' . $model->n2_path .'" class="n2">N2</a>' : '';
	        })
	        ->addColumn('id_path', function($model) {
	        	 return '<a href="' . $model->id_path .'" class="id">ID</a>';
	        })
	        ->addColumn('cv_path', function($model) {
	        	 return '<a href="' . $model->cv_path .'" class="cv">CV</a>';
	        })
	        ->addColumn('status', function($model) {
	        	return '<form method="POST" action="/admin/application/editstatus/' . $model->id .'">	        				
	        				<select name="status" id="status" onchange="this.form.submit()">
								<option value="Pending" ' . ($model->status == 'Pending' ? 'selected' : '') . '>Pending</option>
								<option value="Approved" ' . ($model->status == 'Approved' ? 'selected' : '') . '>Approved</option>
								<option value="Declined" ' . ($model->status == 'Declined' ? 'selected' : '') . '>Declined</option>
							</select>
	        			</form>'; 
	        })
	        ->addColumn('created_at', function($model) {
	        	return '<div class="date">' . $model->created_at .'</div>';
	        })
	        ->addColumn('Edit', function($model) {
	        	return '<a href="/admin/application/edit/' . $model->id  .'" class="button info button-smaller view">View</a>';
	        })
	        ->addColumn('Delete', function($model) {
	        	return '<form method="POST" action="/admin/application/delete/' . $model->id .'" onsubmit="return confirm(\'Are you sure you want to delete this application?\');">
	        				<input name="_method" type="hidden" value="DELETE">
	        				<input class="button alert button-smaller delete" type="submit" value="Delete">
	        			</form>'; 
	        })
	        ->searchColumns('firstname', 'surname', 'tel', 'email', 'status', 'created_at')
	        ->orderColumns('id','firstname', 'surname', 'email', 'matric_path', 'n2_path', 'status', 'created_at')
	        ->make();
	}

	public function showEditApplication($id) {
		$application = Application::find($id);
        if(is_null($application)) {
            return Redirect::route('admin.applications');
        }
		$this->layout->content = View::make('admin.application-edit', compact('application'));
	}

	public function updateEditApplication($id) {
		$application = Application::find($id);
		if(is_null($application)) {
            return Redirect::route('admin.applications');
        }
		$application->status = Input::get('status');
		$application->save();
		return Redirect::route('admin.application.edit', $id)->with('message', 'Application updated');
	}

	public function deleteApplication($id) {				
        Application::find($id)->delete();
        return Redirect::route('admin.applications')->with('message', 'Application deleted');
    }

    public function updateApplicationStatus($id) {
		$application = Application::find($id);
		if(is_null($application)) {
            return Redirect::route('admin.applications');
        }
		$application->status = Input::get('status');
		$application->save();
		return Redirect::route('admin.applications', $id)->with('message', 'Status updated');
	}

	
}