<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\RouteNotFoundException;
use App\Services\PaddlePayment;
use App\Services\PaymentGatewayInterface;
use App\Services\PaymentGatewayService;
use App\Services\StripePayment;
use Dotenv\Dotenv;
use Symfony\Component\Mailer\MailerInterface;

class App
{
    private static DB $db;
    private Config $config;

    public function __construct(
        protected Container $container,
        protected ?Router $router = null,
        protected array $request = [],
    ) {
    }

    public function boot(): static
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        $this->config = new Config($_ENV);

        static::$db = new DB($this->config->db ?? []);

        // If a class implements an interface, we need to register the interface
        // so that the container could recognize it as a class.
        $this->container->set(
            PaymentGatewayInterface::class,
            PaddlePayment::class
        );

        $this->container->set(
            MailerInterface::class,
            // Function needed for constructor of the class
            fn () => new CustomMailer($this->config->mailer["dsn"])
        );

        return $this;

        // Adding classes and their constructors to our container
        // static::$container->set(InvoiceService::class, function (Container $c) {
        //     return new InvoiceService(
        //         $c->get(SalesTaxService::class),
        //         $c->get(PaymentGatewayService::class),
        //         $c->get(EmailService::class)
        //     );
        // });

        // static::$container->set(SalesTaxService::class, fn () => new SalesTaxService());
        // static::$container->set(PaymentGatewayService::class, fn () => new PaymentGatewayService());
        // static::$container->set(EmailService::class, fn () => new EmailService());
    }

    public static function db(): DB
    {
        return static::$db;
    }

    public function run()
    {
        try {
            echo $this->router->resolve($this->request['uri'], strtolower($this->request['method']));
        } catch (RouteNotFoundException) {
            http_response_code(404);

            echo View::make('error/404');
        }
    }
}
