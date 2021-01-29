<?php

namespace App\Http\Controllers\Front;

use App\Helper\cartHelper;
use App\Http\Controllers\Controller;
use App\Models\SiteConfig;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\CheckoutFormInitialize;
use Iyzipay\Model\Currency;
use Iyzipay\Model\Locale;
use Iyzipay\Model\PaymentGroup;
use Iyzipay\Options;
use Iyzipay\Request\CreateCheckoutFormInitializeRequest;

class PaymentController extends Controller
{
    public $options;
    public $userData;
    public $address;
    public $data;


    public function __construct($orderData=null,$addressData=null)
    {
        $this->options = new Options();
        $this->options->setApiKey(SiteConfig::getConfig('paymentApi'));
        $this->options->setSecretKey(SiteConfig::getConfig('paymentSecretKey'));
        $this->options->setBaseUrl(SiteConfig::getConfig('paymentBaseUrl'));

        if ($orderData != null and $addressData !=null)
        {
        $userQuery = User::where('id','=',Auth::id())->get();
        $this->userData = $userQuery[0];

        $this->address = $addressData;
        $this->data = $orderData;
        }
    }

    public function index()
    {


        $request = new CreateCheckoutFormInitializeRequest();
        $request->setLocale(Locale::TR);
        $request->setConversationId("1234567890987654321");
        $request->setPrice($this->data[0]['totalPrice'][0]['cartTotal']);
        $request->setPaidPrice($this->data[0]['totalPrice'][0]['cartTotal']);
        $request->setCurrency(Currency::TL);
        $request->setBasketId($this->data[0]['orderNumber']);
        $request->setPaymentGroup(PaymentGroup::PRODUCT);
        $request->setCallbackUrl(asset(__('payment')));
        $request->setEnabledInstallments(array(2, 3, 6, 9));

        $buyer = new Buyer();
        $buyer->setId($this->userData->id);
        $buyer->setName($this->userData->name);
        $buyer->setSurname($this->userData->surname);
        $buyer->setGsmNumber($this->userData->telephoneNumber);
        $buyer->setEmail($this->userData->email);
        $buyer->setIdentityNumber($this->userData->identityNumber);
        $buyer->setRegistrationAddress($this->address->addressDescription);
        $buyer->setIp($this->userData->IP);
        $buyer->setCity($this->address->province);
        $buyer->setCountry($this->address->country);
        $buyer->setZipCode($this->address->zipCode);
        $request->setBuyer($buyer);

        $shippingAddress = new Address();
        $shippingAddress->setContactName($this->userData->name .' '. $this->userData->surname);
        $shippingAddress->setCity($this->address->province);
        $shippingAddress->setCountry($this->address->country);
        $shippingAddress->setAddress($this->address->addressDescription);
        $shippingAddress->setZipCode($this->address->zipCode);
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new Address();
        $billingAddress->setContactName($this->userData->name .' '. $this->userData->surname);
        $billingAddress->setCity($this->address->province);
        $billingAddress->setCountry($this->address->country);
        $billingAddress->setAddress($this->address->addressDescription);
        $billingAddress->setZipCode($this->address->zipCode);
        $request->setBillingAddress($billingAddress);


        $indis = 0;
        $basketItems = array();

        foreach ($this->data as $key => $value)
        {
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId($value['productID']);
        $firstBasketItem->setName($value['productName']);
        $firstBasketItem->setCategory1($value['category']);
        $firstBasketItem->setCategory2($value['category']);
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice($value['price']);
        $basketItems[$indis] = $firstBasketItem;
        $indis++;
        }

        if ($this->data[0]['totalPrice'][0]['shippingPrice'] > 0) {

            $secondBasketItem = new \Iyzipay\Model\BasketItem();
            $secondBasketItem->setId(__('Shipping'));
            $secondBasketItem->setName(__('Shipping Price'));
            $secondBasketItem->setCategory1(__('Shipping'));
            $secondBasketItem->setCategory2(__('Shipping'));
            $secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
            $secondBasketItem->setPrice($this->data[0]['totalPrice'][0]['shippingPrice']);
            $basketItems[$indis] = $secondBasketItem;
        }
        $request->setBasketItems($basketItems);

                $checkoutFormInitialize = CheckoutFormInitialize::create($request,$this->options);
                $paymentinput = $checkoutFormInitialize->getCheckoutFormContent();

                return view('front.payment',compact('paymentinput'));
    }

    public function callbackPayment()
    {

        $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setToken($_POST['token']);
        $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request,$this->options);

        $addOrder = cartHelper::addOrder($checkoutForm->getStatus(),$checkoutForm->getBasketId());

            if ( $addOrder == true)
            {
              return  redirect()->route('front.account.orders')->with(['status' => 'alert alert-success', 'message' => 'Your order has been received']);
            }
            else if ($addOrder == false)
            {
                return  redirect()->route('front.basket')->with(['status' => 'alert alert-danger', 'message' => 'error']);
            }
        }

}
