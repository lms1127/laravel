<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\classify;
use App\Models\bran_ify;
use Storage;


class ProductController extends Controller
{
    //添加完显示页面
    public function Products_List()
    {
        $product = new Product;
        $data = $product->doproducts_List();
        return view('product.products_List',
        ['data' => $data]);
    }
    //产品删除
    public function delproducts_List(Request $req)
    {
       return Product::where('id',$req->id)->delete();
    }
    //产品批量删除
    public function delproducts_Lists(Request $req)
    {
       $aa = Product::del_goods($req->die);
       return redirect()->route('Products_List');
    }
    //产品添加传输数据
    public function member_add($id)
    {
        $product = new Product;
        $data = $product->member_add($id);
        return view('product.member_add',
        ['data' => $data]);
    }
    //产品添加
    public function domember_add(Request $req)
    {
        // dd($req->all());
        $product = new Product;
        $product->fill($req->all());
        $arr = [];
        // 如果没有修改图片
        if(isset($req->file)){
             // 删除原有图片
             Storage::disk('lms')->delete($req->img);
            $product->file ='/upload/'.$req->file->store('product/'.date('Ymd'));
            
            $arr = ['file' => $product->file];
        }
        $arr += [
            "img_title" => $req->img_title,
            "titles" => $req->titles,
            "number" => $req->number,
            "place" => $req->place,
            "material" => $req->material,
            "brand" => $req->brand,
            "height" => $req->height,
            "zprice" => $req->zprice,
            "sprice" => $req->sprice,
            "keyword" => $req->keyword,
            "content" => $req->content,
        ];
        $aa = Product::where('id','=',$req->id)->update($arr);
        if($aa==true)
        {
            return redirect()->route('Products_List')->with('errors','123');
        }
        else
        {
            return back();
        }
    }
 
    //向页面传数据分类添加
    public function product_category_add()
    {
        $data = classify::get();
        foreach($data as $k => $v)
        {
            if(count(explode('-',$v->ify_path))>=4){
                unset($data[$k]);
            }
        }
        return view('product.product_category_add',
            ['data' => $data]
        );
    }
    //向数据库保存分类添加
    public function doproduct_category_add(Request $req)
    {
        $classify = new classify;
        $ify = $req->all();
        if($ify['ify_pid']==0)
        {
            $ify['ify_path'] = '-';
        }
        else
        {
            $res = classify::where('id',$ify['ify_pid'])->first();
            $ify['ify_path'] = $res->ify_path.$ify['ify_pid'].'-';
        }
        $classify->fill($ify);
        $aa = $classify->save();
        if($aa == true)
        {
            return redirect()->route('product_category_index');
        }
    }
    //修改分类页面
    public function product_category_insert($id)
    {
        $data = classify::where('id',$id)->first();
        if($data->ify_pid == 0)
        {
            $data->ify_pid = $data->id;
        }
        $awsc = classify::where('id',$data->ify_pid)->first();
        // dd($awsc);
       return view('product.product_category_insert',[
            'data' => $data,
            'awsc' => $awsc,
       ]);
    }
    //执行修改分类页面
    public function doproduct_category_insert(Request $req)
    {
        // dd($req->all());
       $aa = classify::where('id',$req->id)->update(['ify_name' => $req->ify_name]);
    //    dd($aa);
       if($aa==true)
       {
           return redirect()->route('product_category_index')->with('errors','234');
       }
       else
       {
           return back();
       }

    }
    //分类主页面
    public function product_category_index()
    {
        $classify = new classify;
        $data = $classify->doproduct_category_index();
        return view('product.product_category_index',
        ['data' => $data]);
    }
    //分类主页删除ajax
    public function doproduct_category_index(Request $req)
    {
        classify::where('id',$req->id)->delete();
        classify::where('ify_pid',$req->id)->delete();
        classify::where('ify_path','like','%-'.$req->id.'-%')->delete();
    }






    //品牌添加
    public function Add_Brand()
    {
        $classify = new classify;
        $data = $classify->doproduct_category_index();

        return view('product.Add_Brand',['data' => $data]);
    }

    //品牌添加处理
    public function doAdd_Brand(Request $req)
    {
        $brand = new Brand;
        $brand->fill($req->all());
        
        if($req->hasFile('brand_logo') && $req->file('brand_logo')->isValid()){
            $brand->brand_logo ='/upload/'.$req->brand_logo->store('brand/'.date('Ymd'));
        }
        $aa = $brand->save();
        $b_id = $brand->id;

        foreach($req->die as $v){
            $bran_ify = new bran_ify;

            $bran_ify->brand_id = $b_id;
            $bran_ify->ify_id = $v;

            $bran_ify->save();
        }
        if($aa == true)
        {
            return redirect()->route('Brand_Manage');
        }
    }
    //品牌首页
    public function Brand_Manage(){
        $data = Brand::get();

        return view('product.Brand_Manage',
            ['data'=>$data]
        );
    }
    //向修改页面传输数据
    public function Add_Brand_update($id)
    {
        $classify = new classify;
        $asdf = $classify->doproduct_category_index();
        $data = Brand::where('id',$id)->first();
        $type = bran_ify::Add_Brand_update($id);
        $arr = [];

        foreach($type as $v){
            $arr[] = $v->id;
        }

        return view('product.Add_Brand_update',
        [
            'asdf' => $asdf,
            'data' => $data,
            'type' => $arr
        ]);
    }

    public function doAdd_Brand_update(Request $req,$id)
    {
        $brand = new Brand;
        $brand->fill($req->all());
        $arr = [];
        if(isset($req->brand_logo))
        {
            $cc = Storage::disk('lms')->delete($req->logo);
            $brand->brand_logo ='/upload/'.$req->brand_logo->store('brand/'.date('Ymd'));
            $arr = [
                'brand_logo' => $brand->brand_logo,
            ];
        }
        $arr += [
            'brand_name' => $req->brand_name,
            'brand_content' =>$req->brand_content,
        ];
        Brand::where('id',$id)->update($arr);
        bran_ify::where('brand_id',$id)->delete();
        foreach($req->die as $v)
        {
            bran_ify::insert([
                'brand_id' => $id,
                'ify_id' => $v
            ]);
        }
    }
    public function Category_Manage(){
        return view('product.Category_Manage');
    }
    public function Brand_detailed()
    {
        return view('product.Brand_detailed');
    }
    public function member_show()
    {
        return view('product.member_show');
    }
    //添加商品页面显示
    public function picture_add(){
        return view('index.picture_add');
    }
    public function dopicture_add(Request $req)//页面传来数据
    {
        $product = new Product;
        $product->fill($req->all());
        if($req->hasFile('file') && $req->file('file')->isValid()){
            $product->file ='/upload/'.$req->file->store('product/'.date('Ymd'));
        }
        $aa = $product->save();
        if($aa == true)
        {
            return redirect()->route('Products_List');
        }
    }
}
