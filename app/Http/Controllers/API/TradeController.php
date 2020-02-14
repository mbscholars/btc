<?php

namespace App\classes\lib\BlockIo;
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\classes\lib\BlockIo;
use App\trades;

class TradeController extends Controller
{
    private $block;
    public function __construct(){
        $this->block = new BlockIo($api_key = env('BLOCK_KEY', false), $pin=env('BLOCK_PIN', false), $api_version = 2);
        $this->middleware('auth:api');
    }

  
    public function index(){
        //this function returns the default configurations
        

    }
    public function get_market_price(){

    }
    public function create_trade(CreateTradeRequest $request){

        $validated = $request->validated();

        //request validated
        
        $selling_price = $this->getPrice($validated->percentage); //price per crypto
        
        //latched selling information
        
        //confirm wallet has enough funds
        $networkFee = $this->estimateFees();
        
        //total coins required = netwokfee + quantity
        $coins = $validated->quantity;
        $balance = $this->fetch_wallet_balance();
        $type = $request->type;

        if($balance < ($networkFee + $coins) and $type=="SELL"){
            return response()->json([
                'status' => 'false',
                'message' => 'Balance is insufficient, cannot create trade',
                'data' => [
                    'Available Balance' => $balance,
                    'Network Fee' => $networkFee,
                    'Total Cost' => $networkFee + $coins
                ]
            ]);
        }

        //balance is ok
        //generate reference code
        $reference =  $this->generateReference();
        //create a wallet
        if($this->createWallet($label = 'ESC' . $reference)){
            //wallet created successfully


            /* Create trade but set status as zero,  */
            $trade = new trades;
            $trade->status = (($type == 'SELL') ? 0 : 2);
            $trade->trx_charges = $networkFee;
            $trade->reference = $reference;
            $trade->escrow = $label;
            $trade->payment_window = $request->window;
            $trade->bank_id = json_encode($request->bank_id);
            $trade->payment_method = $request->payment_method;
            $trade->quantity = $request->quantity;
            $trade->min_limit = $request->min_limit;
            $trade->terms = $request->terms;
            $trade->type = $type;
            $trade->crypto = $request->crypto;
            $trade->user_id = $this->user->id;
            if($trade->save()){
                $msg = "Trade Created but not published!";
                //transfer funds

                if($type == "SELL"){
                    if($this->transfer_to_escrow($coins,$label)){
                        $trade = trades::where('reference', $reference)->first();
                        if(isset($trade->id)){
                            $trade->status = 1;
                            if($trade->save()){
                                //trade published
                                return response()->json([
                                    'status' => 'true',
                                    'message' => 'Trade Advertisement Placed Successfully'
                                ]);
                            }
    
                        }else{
                            return response()->json([
                                'status' => 'false',
                                'message' => 'An impossible Error occured! CODE: 9808'
                            ]);
                        }
                    }
                }else{
                    return response()->json([
                        'status' => 'true',
                        'message' => 'Trade Advertisement created successfully'
                    ]);
                }

            }
            
        }else{
            return response()->json([
                'status' => 'false',
                'message' => 'Escrow Failed',
                'data' => []
            ]);
        }

        
       


        //estimate the network fee


    }

    public function openTrade(Request $request){
        $request->validate([
            'quantity' => 'required|numeric',
            'trade_id' => 'required|integer|exists:trades,id'
        ]);
        //find rules
        $trade = trades::find($request->trade_id);

        $quantity_to_buy = $request->quantity;

        if($quantity_to_buy < $trade -> min_limit or $quantity_to_buy > $trade -> max_limit){
            return response()->json([
                'status' => 'false',
                'message' => "Trade could not be opened. Invalid entries",
                'data' => $trade,
            ]);
        }

        //create a record in trade+meta
        $buyer = new trade_meta;


    }

    public function estimateFees(){

    }
    public function getPrice($percentage, $type='-'){
        $percentage = $percentage / 100;
        $cost = $this->block->get_current_price();
        if($type == '+'){
            //add percentage to it
            $sp = (1+$percentage) * $cost;
        }else{
            $sp = (1-$percentage) * $cost;
        }
        return $sp;
    }
    public function fetch_wallet_balance($user_id){

    }
    public function transfer_to_escrow($label){

    }
    public function withdraw_to_address(){

    }
    public function fetch_transaction_status(){

    }
    public function fetch_transaction_history(){

    }
    public function release_funds(){

    }
    public function test(){
        $block_io = $this->block;
         $newAddressInfo = $this->block->get_new_address(array('user_id' => '2', 'label' => 'User-2-W-2'));
         return response()->json($newAddressInfo);//{"status":"success","data":{"network":"BTCTEST","user_id":8,"address":"2N5CZEqbNLchGATRy9QP4YMpUy85jAeEQog","label":"User-2-W-1"}}
        // $test = $this->block->get_my_addresses(array('page' =>1));
        /**
         * {"status":"success","data":{"network":"BTCTEST","addresses":[{"user_id":0,"address":"2N4NUPiZQxR6xDhecNyzX7GgT5Yhrhjxy3f","label":"default","pending_received_balance":"0.00000000","available_balance":"0.00000000","is_segwit":true},{"user_id":1,"address":"2MwmofBrbqg6hgDb2JziEYTSGDTd4G3n9bi","label":"shibe1","pending_received_balance":"0.00000000","available_balance":"0.00000000","is_segwit":true},{"user_id":2,"address":"2N94mvZ6VK1nnQjy18sagezHTKoKrxAc4CM","label":"shibe2","pending_received_balance":"0.00000000","available_balance":"0.00000000","is_segwit":true},{"user_id":8,"address":"2N5CZEqbNLchGATRy9QP4YMpUy85jAeEQog","label":"User-2-W-1","pending_received_balance":"0.00000000","available_balance":"0.00000000","is_segwit":true}],"page":1,"has_more":false}}
         */
        // $test = $this->block->get_network_fee_estimate(array('amounts' => '1.0', 'to_addresses' => '2N4NUPiZQxR6xDhecNyzX7GgT5Yhrhjxy3f'));
        // $test = $block_io->get_current_price();


        // return response()->json($test);
    }
}
