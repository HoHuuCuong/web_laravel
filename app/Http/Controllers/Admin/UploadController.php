<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HttpServices\UploadService;

class UploadController extends Controller
{
    protected $upload;
    public function __construct(UploadService $upload)
    {
        $this->upload;
    }
    public function store(Request $request)
    {
        $this->upload->store($request);
    }
}