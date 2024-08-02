<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Exceptions\RouteNotFoundException;
use App\Router;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class RouterTest extends TestCase
{
    private Router $router;

    #[Test]
    protected function setUp(): void
    {
        parent::setUp();

        $this->router = new Router();
    }

    #[Test]
    public function test_it_registers_a_route(): void
    {
        // When we call a register method
        $this->router->register("get", "/users", ["Users", "index"]);

        $expected = [
            "get" => [
                "/users" => ["Users", "index"]
            ]
        ];

        // Then we assert route was registered
        $this->assertSame($expected, $this->router->routes());
    }

    #[Test]
    public function test_it_registers_a_get_route(): void
    {
        $this->router->get("/users", ["Users", "index"]);
        $expected = [
            "get" => [
                "/users" => ["Users", "index"]
            ]
        ];
        $this->assertSame($expected, $this->router->routes());
    }

    #[Test]
    public function test_it_registers_a_post_route(): void
    {
        $this->router->post("/users", ["Users", "index"]);
        $expected = [
            "post" => [
                "/users" => ["Users", "index"]
            ]
        ];
        $this->assertSame($expected, $this->router->routes());
    }

    #[Test]
    public function test_there_are_no_routes_when_router_is_created(): void
    {
        $this->assertEmpty((new Router())->routes());
    }

    #[Test]
    #[DataProviderExternal(\Tests\DataProviders\RouterDataProvider::class, "routeNotFoundCases")]
    public function it_throws_route_not_found_exception(
        string $requestUri,
        string $requestMethod
    ): void {
        $users = new class()
        {
            public function delete()
            {
                return true;
            }
        };

        $this->router->post("/users", [$users::class, "store"]);
        $this->router->get("/users", ["Users", "index"]);

        $this->expectException(RouteNotFoundException::class);

        $this->router->resolve($requestUri, $requestMethod);
    }

    #[Test]
    public function it_resolves_route_from_a_closure(): void
    {
        $this->router->get("/users", fn () => [1, 2, 3]);

        $this->assertEquals(
            [1, 2, 3],
            $this->router->resolve("/users", "get")
        );
    }

    #[Test]
    public function it_resolves_route(): void
    {
        $users = new class()
        {
            public function index(): array
            {
                return [1, 2, 3];
            }
        };

        $this->router->get("/users", [$users::class, "index"]);

        // assertEquals = ==
        // assertSame = ===
        $this->assertSame(
            [1, 2, 3],
            $this->router->resolve("/users", "get")
        );
    }
}
