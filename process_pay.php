<?php session_start();
         if(isset($_POST['button'])){
             $email = $_SESSION['email']; 
         
             $curl = curl_init();

             $customer_email = $email;
             $amount = 1000;  
             $currency = "NGN";
             $token = "";
             $alphabets = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

             for($i=0; $i<10; $i++){
               $index = mt_rand(0,count($alphabets)-1);
               $token .= $alphabets[$index];
     
             }
             $txref = "rave-2993383833".$token; // ensure you generate unique references per transaction.
             $PBFPubKey = "FLWPUBK_TEST-aad9b5fffc89bcaf8ae85e48178d2f23-X"; // get your public key from the dashboard.
             $redirect_url = "https://localhost/startng_php2/Process_ravepayment.php";
            
             
             
             curl_setopt_array($curl, array(
               CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => json_encode([
                 'amount'=>$amount,
                 'customer_email'=>$customer_email,
                 'currency'=>$currency,
                 'txref'=>$txref,
                 'PBFPubKey'=>$PBFPubKey,
                 'redirect_url'=>$redirect_url,
                 
               ]),
               CURLOPT_HTTPHEADER => [
                 "content-type: application/json",
                 "cache-control: no-cache",
               ],
             ));
             
             $response = curl_exec($curl);
             $err = curl_error($curl);
             
             if($err){
               // there was an error contacting the rave API
             
               die('Curl returned error: ' . $err);
             }
             
             $transaction = json_decode($response);
             
             if(!$transaction->data && !$transaction->data->link){
               // there was an error from the API
               print_r('API returned error: ' . $transaction->message);
             }
             header('Location: ' . $transaction->data->link);
            }
         $_SESSION['email'] = $customer_email;
         $_SESSION['txref'] = $txref;
         ?>
