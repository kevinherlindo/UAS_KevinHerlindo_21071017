<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; //put this
use Illuminate\Http\Request;
use App\Models\Siswa_model;

class SiswaController extends Controller
{
  public function index()
  {
      $siswa = Siswa_model::get();
      return view('admin.siswa.index', compact('siswa'));
  }

  public function add()
  {
      $all_amenities="";
      return view('admin.Siswa_model_add',compact('all_amenities'));
  }

  public function store(Request $request)
  {
      $request->validate([           
          'nama' => 'required',
          'alamat' => 'required'
      ]);

      $obj = new Siswa_model();     
      $obj->nama = $request->nama;
      $obj->alamat = $request->alamat;      
      $obj->save();

      return redirect()->back()->with('success', 'Siswa_model is added successfully.');

  }

  public function edit($id)
  {
      $Siswa_model_data = Siswa_model::where('id',$id)->first();
      return view('admin.Siswa_model_edit', compact('Siswa_model_data'));
  }

  public function update(Request $request,$id) 
  {        
      $obj = Siswa_model::where('id',$id)->first();
      $request->validate([
          'nama' => 'required',
          'alamat' => 'required'
      ]);

      $obj->nama   = $request->nama;
      $obj->alamat = $request->alamat;     
      $obj->update();

      return redirect()->back()->with('success', 'Siswa_model is updated successfully.');
  }

  public function delete($id)
  {
      $single_data = Siswa_model::where('id',$id)->first();
      $single_data->delete();
      return redirect()->back()->with('success', 'Siswa_model is deleted successfully.');
  } 
}
