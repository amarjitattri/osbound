<?php

  namespace App\Http\Controllers;

  use App\Models\CompanyContact;
  use App\Models\Reason;
  use App\Models\Status;
  use Illuminate\Support\Facades\DB;
  use Illuminate\Support\Facades\Session;
  use Illuminate\Support\Str;
  use Intervention\Image\Facades\Image;

  class MainController extends Controller
  {
    protected $page_data;
    protected $enquiry_media_dir = 'enquiry_medias/';

    public function renderView($name)
    {
      return view(sprintf("backend.%s.%s", $this->page_data['baseRoute'], $name), $this->page_data);
    }

    public function notifications($message, $type = '')
    {
      Session::flash('message', $message);
      Session::flash('type', $type ?? 'info');
      return $this;
    }

    public function uploadImages($request, $disk = 's3', $permission = 'public')
    {
      $files = $request->files;
      $returnPath = array();
      foreach ($files as $key => $file) {
        if ($request->hasFile($key)) {
          $path = $request->file($key)->store($this->dir . $key, array('disk' => $disk, 'visibility' => $permission));
          $request->merge([$key . '_url' => $path]);
          $returnPath[$key] = $path;
        }
      }
      return $returnPath;
    }

    public function createThumbnail($path, $width, $height)
    {
      $img = Image::make($path)->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
      });
      $img->save($path);
    }

    protected function getCompanyContactListNameIndex()
    {
      $this->getCompanyContactList('name');
    }

    protected function getCompanyContactList($return = 'id')
    {
      $names = CompanyContact::where('is_active', true)->groupBy('name')->orderBy('name');
      $companies = CompanyContact::where('is_active', true)->groupBy('company')->orderBy('company');
      if ($return == 'name') {
        $this->page_data['filteredNames'] = $names->pluck('name', 'name');
        $this->page_data['filteredCompanies'] = $companies->pluck('company', 'company');
      } else {
        $this->page_data['names'] = $names->pluck('name', 'id');
        $this->page_data['companies'] = $companies->pluck('company', 'id');
      }
      return [$names, $companies];
    }

    protected function getStatus()
    {
      return \App\Models\Status::where('is_active', true)->orderBy('status_id');
    }

    protected function getReason()
    {
      return \App\Models\Reason::where('is_active', true)->orderBy('title');
    }

    protected function getEnquires()
    {
      return \App\Models\Enquiry::where('is_active', true)->orderBy('id', 'desc');
    }

    protected function getJobs()
    {
      return \App\Models\Estimate::where('is_active', true)->orderBy('id', 'desc');
    }

    protected function keyPerformance($table)
    {
      $this->page_data['keyPerformanceType'] = ucfirst(Str::singular($table, 1));
      $allStatusQuery = Status::selectRaw("COUNT($table.id) AS total,statuses.title,statuses.status_id as id");
      if ($table == 'enquiries') {
        $allStatusQuery->where('enquiries.skip_enquiry', false);
      }
//            $allStatusQuery->whereIn($table . '.status',function ($allStatusQuery){
//                $allStatusQuery->select('statuses.status_id')->from('statuses')
//                    ->where('statuses.is_active',true);
//            });
      $allStatusQuery->leftJoin($table, 'statuses.status_id', '=', $table . '.status')->where('statuses.is_active', true)->groupBy('statuses.status_id');


      $allReasonQuery = Reason::selectRaw("COUNT($table.id) AS total,reasons.title,reasons.reason_id as id");
      if ($table == 'enquiries') {
        $allReasonQuery->where('enquiries.skip_enquiry', false);
      }
      $allReasonQuery->leftJoin($table, 'reasons.reason_id', '=', $table . '.reason')->where('reasons.is_active', true)->groupBy('reasons.reason_id');


      return array('status' => $allStatusQuery->get(), 'reason' => $allReasonQuery->get());
    }

    protected function getTableLastId(string $table)
    {
      return $this->getTableInfo($table)->AUTO_INCREMENT;
    }

    private function getTableInfo(string $table)
    {
      return DB::table('INFORMATION_SCHEMA.TABLES')
        ->where('TABLE_SCHEMA', config('site.database'))
        ->where('TABLE_NAME', $table)
        ->first();
    }

    protected function placeOfWorks()
    {
      return \App\Models\PlaceOfWork::where('is_active', true)->orderBy('place');
    }
  }
