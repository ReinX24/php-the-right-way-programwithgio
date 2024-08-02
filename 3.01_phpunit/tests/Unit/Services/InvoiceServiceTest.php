<?php

namespace Tests\Unit\Services;

use App\Services\EmailService;
use App\Services\InvoiceService;
use App\Services\PaymentGatewayService;
use App\Services\SalesTaxService;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class InvoiceServiceTest extends TestCase
{
    #[Test]
    public function it_processes_invoice()
    {
        // Test doubles, all methods from these classes either return null or
        // their type hint (null to bool).
        $salesTaxServiceMock = $this->createMock(SalesTaxService::class);
        $gatewayServiceMock = $this->createMock(PaymentGatewayService::class);
        $emailServiceMock = $this->createMock(EmailService::class);

        $gatewayServiceMock->method("charge")->willReturn(true);

        // Given invoice service
        $invoiceService = new InvoiceService(
            $salesTaxServiceMock,
            $gatewayServiceMock,
            $emailServiceMock
        );

        $customer = ["name" => "Rein"];
        $amount = 150;

        // When the process is called
        $result = $invoiceService->process($customer, $amount);

        // Then call invoice is processed successfully
        $this->assertTrue($result);
    }

    #[Test]
    public function it_sends_receipt_email_when_invoice_is_processed()
    {
        $customer = ["name" => "Rein"];
        $amount = 150;

        $salesTaxServiceMock = $this->createMock(SalesTaxService::class);
        $gatewayServiceMock = $this->createMock(PaymentGatewayService::class);
        $emailServiceMock = $this->createMock(EmailService::class);

        $gatewayServiceMock->method("charge")->willReturn(true);

        // Mocking
        // This checks if the arguments sent in the send method and if the 
        // method works.
        // This returns as a fail on tests if the $customer variables is set
        // before assertion in the InvoiceService class.
        $emailServiceMock
            ->expects($this->once())
            ->method("send")
            ->with($customer, "receipt");

        $invoiceService = new InvoiceService(
            $salesTaxServiceMock,
            $gatewayServiceMock,
            $emailServiceMock
        );

        // When the process is called
        $result = $invoiceService->process($customer, $amount);

        // Then call invoice is processed successfully
        $this->assertTrue($result);
    }
}
