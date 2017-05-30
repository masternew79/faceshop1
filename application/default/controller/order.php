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

    public function getOrder()
    {
        if(HTP_Request::get('user_id'))
        {
            $user_id = intval(HTP_Request::get('user_id'));
            $result = array();
            $orders = Order::model()->findAllBySql('SELECT id, status, total, create_date FROM `order` WHERE user_id = :uid', array(':uid' => $user_id));
            $listProductName = array();
            foreach ($orders as $order)
            {
                $details = OrderDetail::model()->findAllBySql('select product_id from order_detail where order_id = :oid', array(':oid' => $order->id));
                foreach ($details as $detail)
                {
                    $products = Product::model()->findBySql('select name from product where id = :pid', array(':pid'=>$detail->product_id));
                    array_push($listProductName, $products->name);
                }
                $result [] = array('name' => $listProductName, 'total' => $order->total, 'status' => $order->status, 'create_at' => $order->create_date, 'id_bill' => $order->id);
                $listProductName = array();
            }
            echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ;
        }
        else
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
        if(HTP_Request::post('Order'))
        {
            $order = new Order();
            $order->load(HTP_Request::post('Order'));
        //    $order = Order::model()->find('id = 1');
            $order->status = 0;
            $order->hash = md5(rand(1, 1000000));
          //  Order::model()->insert();
           // try
          //  {
               $order->id = $order->insert();
          //  }
//            catch (Exception $ex)
//            {
//                echo 'fail';
//                return;
//                //$this->redirect(HTP::$baseUrl.'/order/fail');
//            }


            $body = '<h1>FaceShop - Xác nhận đơn hàng</h1><br>';
            $body .= '<p>Quý khách vừa đặt hàng trên hệ thống FaceShop</p>';
            $body .= '<br><p><h2>Chi tiết đơn hàng</h2></p>';
            $i = 1;
            $body .= '<table>';
            $details = OrderDetail::model()->findAllBySql('select product_id, price, "count", total from order_detail where order_id = :oid', array(':oid' => $order->id));
            foreach ($details as $detail)
            {
                $body .= '<tr>';
                $products = Product::model()->findBySql('select name, price  from product where id = :pid', array(':pid'=>$detail->product_id));
                $body .= '<td> $i++ </td>';
                $body .= '<td> $products->name </td>';
                $body .= '<td> $products->price </td>';
                $body .= '<td> $detail->count </td>';
                $body .= '<td> $detail->total </td>';
                $body .= '</tr>';
            }
            $body .= '</table>';
            $body .= '<p>Qúy khách vui lòng <a href="' . HTP::$baseUrl .'/order/verify/'.$order->id.'/'.$order->hash.'">Xác nhận đơn hàng tại đây</a></p>>';

            $subject = 'FaceShop - Xác nhận đơn hàng';

            Helper::sendmail($order->email, $body, $subject);
        }
        else
            $this->redirect(HTP::$baseUrl);
    }


    public function getOrder()
    {
        if(HTP_Request::post('user_id'))
        {
            $user_id = intval(HTP_Request::post('user_id'));
            $result = array();
            $orders = Order::model()->findAllBySql('SELECT id, status, total FROM `order` WHERE user_id = :uid', array(':uid' => $user_id));
            $listProductName = array();
            foreach ($orders as $order)
            {
                $details = OrderDetail::model()->findAllBySql('select product_id from order_detail where order_id = :oid', array(':oid' => $order->id));
                foreach ($details as $detail)
                {
                    $products = Product::model()->findBySql('select name from product where id = :pid', array(':pid'=>$detail->product_id));
                    array_push($listProductName, $products->name);
                }
                $result [] = array('name' => $listProductName, 'total' => $order->total, 'status' => $order->status);
                $listProductName = array();
            }
            echo '<pre>'.json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT).'</pre>' ;
        }
        else
            $this->redirect(HTP::$baseUrl);
    }


    public function test()
    {
        $p = new Order();
        $p->load(HTP_Request::post('Order'));
        $p->insert();
    }
}