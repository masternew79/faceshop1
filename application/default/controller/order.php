<?php
/**
 * Created by PhpStorm.
 * User: mouse
 * Date: 30/05/2017
 * Time: 10:45 AM
 */
class Default_Controller_Order extends Default_Controller_Base
{
    public function index()
    {
        $this->redirect(HTP::$baseUrl);
    }


    public function verify($param)
    {
        if(isset($param[0]) && isset($param[1]))
        {
            $order_id = intVal($param[0]);
            $hash = $param[1];
            $order = Order::model()->find('id = :id', array(':id'=>$order_id));
            if(isset($order->id) && $order->status == 0)
            {
                if($order->hash == $hash)
                {
                    Order::model()->updateByColumns('status = :status','id = :id', array(':status'=>1,':id'=>$order_id));
                    echo json_encode(array('code'=>1, 'message'=>'Xác nhận đơn hàng thành công'), JSON_UNESCAPED_UNICODE);
                    return;
                }
                else
                {
                    echo json_encode(array('code'=>2, 'message'=>'Xác nhận đơn hàng thất bại'), JSON_UNESCAPED_UNICODE);
                }
            }
            else
            {
                $this->redirect(HTP::$baseUrl);
            }
        }
        else
            $this->redirect(HTP::$baseUrl);
    }

    public function add()
    {
        if(HTP_Request::post('order'))
        {
            $order = new Order();
            $order->load(HTP_Request::post('order'));
            $order->status = 0;
            $order->hash = md5(rand(1, 1000000));
            $order->insert();




            $body = '<h1>FaceShop - Xác nhận đơn hàng</h1><br>';
            $body .= '<p>Quý khách vừa đặt hàng trên hệ thống FaceShop</p>';
            $body .= '<br><p><h2>Chi tiết đơn hàng</h2></p>';
            $i = 1;
            $details = OrderDetail::model()->findAllBySql('select product_id, price, "count", total from order_detail where order_id = :oid', array(':oid' => $order->id));
            foreach ($details as $detail)
            {
                $products = Product::model()->findBySql('select name,  from product where id = :pid', array(':pid'=>$detail->product_id));
                $body .= '<p> '. $i++ .'&nbsp</p>';
            }


            $body .= '<p></p>';

            $subject = 'FaceShop - Xác nhận đơn hàng';




        }
        else
            $this->redirect(HTP::$baseUrl);
    }
}