<?php

namespace App\Controllers;
use App\Models\WanderLustModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Files\FileCollection;

class WanderLust extends BaseController
{
    public function index()
    {
        //
    }

    public function showlist()
    {
       
        
        //   $listModel = new WanderLust();
        //   $data['wanderLustData'] = $listModel->findAll();
        //   //table name ^
        //   return view('listings', $data);
        
          
     
    }
    //###########################################################################################################
    public function newlist()
    {
        
        
    
          return view('new_listings');
    }



    //###########################################################################################################
    public function allshow()
    {
        $DBModel=new WanderLustModel();
        $data['listings'] = $DBModel->findAll();
        
        return view('all_listings', $data);
    }

    
    //###########################################################################################################
    public function addlist()
    {
        
    error_reporting(0);

    $msg = "";

    // If add button is clicked ...
    if (isset($_POST['add'])) {

        $filename = $_FILES["listing_image"]["name"];
        $file = $this->request->getFile('listing_image');
        if($file->isValid() && ! $file->hasMoved()){
            $imageName=$file->$filename;
            $file->move('upload/',$imageName);
        }

        $addModel=new WanderLustModel();
        $data = [
        'title' => $this->request->getVar('listing[title]'),
        'description'  => $this->request->getVar('listing[description]'),
        'image' =>"{$filename}",
        'price'  => $this->request->getVar('listing[price]'),
        'country'  => $this->request->getVar('listing[country]'),
        'location'  => $this->request->getVar('listing[location]'),
        
    ];
         $addModel->insert($data);
        return $this->response->redirect(site_url('/'));


         }
      }

    //###########################################################################################################
    // public function edit_list($id = null){
    //     $editModel=new WanderLustModel();
    //     $data['list_obj'] = $editModel->where('id', $id)->first();
    //     return view('edit_list', $data);
    // }

    // public function edited_list(){
    //     $id = $this->request->getVar('id');
    //     error_reporting(0);
    
    //     $msg = "";
    
    //     // If add button is clicked ...
    //     if (isset($_POST['edit'])) {
    
    //         $filename = $_FILES["listing_image"]["name"];
    //         $file = $this->request->getFile('listing_image');
    //         if($file->isValid() && ! $file->hasMoved()){
    //             $imageName=$file->$filename;
    //             $file->move('upload/',$imageName);
    //         }
    
    //         $editedModel=new WanderLustModel();
    //         $data = [
    //         'title' => $this->request->getVar('listing[title]'),
    //         'description'  => $this->request->getVar('listing[description]'),
    //         'image' =>"{$filename}",
    //         'price'  => $this->request->getVar('listing[price]'),
    //         'country'  => $this->request->getVar('listing[country]'),
    //         'location'  => $this->request->getVar('listing[location]'),
            
    //     ];
    //     $editedModel->update($data,['id' => $id]);
        
    //           return $this->response->redirect(site_url('/all_listings'));
    
    //          }
          
    
     
    // }


 //###########################################################################################################

 public function edit($id){
        $house=new WanderLustModel();
        $data['editList']=$house->find($id);
        return view('edit_list',$data);
    }


//###########################################################################################################
    public function editedList($id){
        $house=new WanderLustModel();
        $img_item=$house->find($id);
        // echo $img_item['image'];
        $old_img_name=$img_item['image'];
        if(file_exists("uploads/".$old_img_name)){
            unlink("uploads/".$old_img_name);
        }

        $filename = $_FILES["listing_image"]["name"];
        $file = $this->request->getFile('listing_image');
        if($file->isValid() && ! $file->hasMoved()){

            if(file_exists("uploads/".$old_img_name)){
            unlink("uploads/".$old_img_name);
        }
         
            $imageName=$file->getRandomName();
            $file->move('upload/',$imageName);
        }

            $data = [
                'title' => $this->request->getVar('listing[title]'),
                'description'  => $this->request->getVar('listing[description]'),
                'image' =>"{$imageName}",
                'price'  => $this->request->getVar('listing[price]'),
                'country'  => $this->request->getVar('listing[country]'),
                'location'  => $this->request->getVar('listing[location]'),
                
            ];

            $house->update($id,$data);
            return $this->response->redirect(site_url('/'));
    }


 //###########################################################################################################


    public function single_view($id){
        $house=new WanderLustModel();
        $data['viewList']=$house->find($id);
        return view('single_listing',$data);
    }
 //###########################################################################################################
    public function single_delete($id){
        $house=new WanderLustModel();
        $house->where('id', $id);
        $house->delete();
        return $this->response->redirect(site_url('/'));

    }

//###########################################################################################################


}



