<?php namespace EasyDonate\Managers;

use EasyDonate\Exceptions\BadParamsException;

class PaymentManager
{
    protected $requestManager;

    protected $customer;
    protected $serverId;
    protected $products;
    protected $email;
    protected $coupon;
    protected $url;

    protected $payment;

    public function __construct(RequestManager $requestManager)
    {
        $this->requestManager = $requestManager;
    }

    public function setCustomer(string $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function setServerId(int $serverId)
    {
        $this->serverId = $serverId;
        return $this;
    }

    public function setProducts(array $products)
    {
        $this->products = json_encode($products);
        return $this;
    }

    public function setEmail(string $email) {
        $this->email = $email;
        return $this;
    }

    public function setCoupon(string $coupon) {
        $this->coupon = $coupon;
        return $this;
    }

    public function setSuccessUrl (string $url) {
        $this->url = $url;
        return $this;
    }

    public function create(bool $redirect = false)
    {
        if (!$this->customer || !$this->serverId || !$this->products) {
            throw new BadParamsException('Required parameters not passed: customer, server_id or products');
        }

        $query = http_build_query([
            'customer' => $this->customer,
            'server_id' => $this->serverId,
            'products' => $this->products,
            'email' => $this->email,
            'coupon' => $this->coupon,
            'success_url' => $this->url
        ]);

        $response = $this->response = $this->requestManager->get("payment/create?{$query}");

        return $redirect ? $this->redirect() : $response->payment;
    }

    private function redirect()
    {
        if ($this->response && isset($this->response->url)) {
            if (class_exists('\Illuminate\Http\RedirectResponse', false)) {
                return redirect()->away($this->response->url);
            }
            header("Location: {$this->response->url}");
        }

        return false;
    }
}
