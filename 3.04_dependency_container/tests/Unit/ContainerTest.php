<?php

namespace Tests\Unit\Services;

use App\Container;
use App\Services\InvoiceService;
use App\Services\PaddlePayment;
use App\Services\PaymentGatewayInterface;
use App\Services\SalesTaxService;
use App\Services\StripePayment;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public Container $container;

    #[Test]
    protected function setUp(): void
    {
        parent::setUp();

        $this->container = new Container();

        $this->container->set(
            PaymentGatewayInterface::class,
            PaddlePayment::class
        );

        $this->container->set(SalesTaxService::class, fn () => new SalesTaxService());
        $this->container->set(InvoiceService::class, fn () => new SalesTaxService());
    }

    #[Test]
    public function it_has_entry()
    {
        $this->assertTrue($this->container->has(SalesTaxService::class));
    }

    #[Test]
    public function it_get_class_container()
    {
        $result = $this->container->get(StripePayment::class);
        $this->assertSame(StripePayment::class, $result::class);
    }

    #[Test]
    public function it_set_class_container()
    {
        $this->assertTrue($this->container->has(InvoiceService::class));
    }

    #[Test]
    public function it_resolves_class()
    {
        $result = $this->container->resolve(InvoiceService::class);
        $this->assertSame(InvoiceService::class, $result::class);
    }
}
