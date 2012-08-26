﻿<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Products extends Controller_Index {

	public function before(){
	parent::before();

	}
	
	public function action_index()
	{

	}

	public function action_cat()
	{
		$id = (int) $this->request->param('id');
		$category = ORM::factory('category')->where('id', '=', $id)->find();

            // получаем общее количество (в моем случае) товаров
       $count = $category->products->count_all();
     // передаем значение количества товаров в модуль pagination и формируем ссылки
        $pagination = Pagination::factory(array('total_items' => $count,))
                      ->route_params(array(
                      'controller' => Request::current()->controller(),
                      'action' => Request::current()->action(),
                      'id' => $this->request->param('id')
                    ));

		$products= $category->products->limit($pagination->items_per_page)
                            ->offset($pagination->offset)
                            ->find_all();


		$this->template->page_title = 'Продукты';
        $products = View::factory('v_products',array('products'=>$products,'pagination'=>$pagination));
		$this->template->block_center = array('products'=>$products);
	}
	

	public function action_product(){
	//	$cat = (int) $this->request->param('cat');
        $id = (int) $this->request->param('id');

        $product = ORM::factory('product')->where('id', '=', $id)->find();
		
		$this->template->page_title = 'Продукты';
		
		$images = $product->images->find_all();
		
		$viewproduct = View::factory('v_product')->bind('product',$product)->bind('images',$images);
		$this->template->block_center = array('viewproduct'=>$viewproduct);
		
	}
	
} 
