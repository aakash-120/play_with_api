<?php

use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    public function indexAction()
    {
        
        // $host = 'https://openlibrary.org/search?q=';
        // $url = $this->request->get('search');
        // $len = strlen($url);
        // for ($i = 0; $i < $len; $i++) {
        //     if ($url[$i] == ' ') {
        //         $url[$i] = '+';
        //     }
        // }
        // $path = '&mode=ebooks&has_fulltext=true';
        // $url2 = $host.$url.$path;

        // $ch = curl_init();
        //  curl_setopt($ch, CURLOPT_URL, $url2);
        //  curl_exec($ch);



        $host = 'https://openlibrary.org/search.json?q=';
        $url = $this->request->get('search');
        $len = strlen($url);
        for ($i = 0; $i < $len; $i++) {
            if ($url[$i] == ' ') {
                $url[$i] = '+';
            }
        }
        $path = '&mode=ebooks&has_fulltext=true';
        $url2 = $host.$url.$path;

        $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url2);
        // curl_exec($ch);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        echo "<pre>";
         $a =json_decode($response , true);
       //  print_r($a);


    //    foreach($a as $k =>$v)
    //    {
    //        foreach($v as $k1 =>$v1)
    //        {
    //          echo "<pre>";
    //          print_r($v1['title']);
    //          print_r($v1['edition_key'][0]);
    //          echo "google ki id------------------------------";
    //          if(isset($v1['id_google'][0]))
    //          {
    //          print_r($v1['id_google'][0]);
    //          }
    //         print_r($v1['id_google']);
    //          echo "</pre>";
    //        }
          
    //    }

       $this->view->nescafe = $a;
     // die();

    }
    public function searchAction() {

    }


    public function detailAction() {
        print_r($this->request->getPost());
        $this->view->data = $this->request->getPost();
        //die();
    }
}