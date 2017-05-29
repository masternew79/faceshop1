<?php
/**
 * Created by PhpStorm.
 * User: mouse
 * Date: 23/05/2017
 * Time: 8:56 AM
 */
class Default_Controller_Cart extends Default_Controller_Base{

    public function index(){
        $this->view->items = HTP_Session::get('cart');
        $this->view->render('index');
    }

    public function add($param){
        //$param[0] : id of product
        //$param[1] : number of item
        $cart = HTP_Session::get('cart');
        if(isset($cart[$param[0]])){
            $cart[$param[0]]->setNumbers($cart[$param[0]]->getNumbers() + $param[1]);
        }else{
            $item = new Item;
            $product = Products::model()->find('id = :id', array(':id' => $param[0]));
            $item->setProduct($product);
            $item->setNumbers($param[1]);
            $cart[$product->id] = $item;
        }
        HTP_Session::set('cart', $cart);
        $this->redirect(HTP::$baseUrl . '/cart');
    }

    public function update($param){
        //$param[0] : id of product
        //$param[1] : number to update
        //You should validate this params
        $cart = HTP_Session::get('cart');
        if(isset($cart[$param[0]])){
            $cart[$param[0]]->setNumbers($param[1]);
        }
        HTP_Session::set('cart', $cart);
        $this->redirect(HTP::$baseUrl . '/cart');
    }

    public function remove($param){
        $cart = HTP_Session::get('cart');
        if(isset($cart[$param[0]])){
            unset($cart[$param[0]]);
        }
        HTP_Session::set('cart', $cart);
        $this->redirect(HTP::$baseUrl . '/cart');
    }

    public function destroy(){
        HTP_Session::delete('cart');
        $this->redirect(HTP::$baseUrl . '/cart');
    }

    public function save(){
        //Create form to customer can input order information
        //Using Order model to save customer information
        //Using OrderDetail and HTP_Session::get('cart') to save order detail
    }
}