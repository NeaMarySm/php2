<?php

// 1 задание

// Найти и указать в проекте Front Controller и 
//расписать классы, которые с ним взаимодействуют.

/*
Front Controller - class Kernel

Классы, которые с ним взаимодействуют:

RouteCollection
ContainerBuilder
Request
Response
PhpFileLoader
FileLocator
UrlMatcher
RequestContext
Session
ControllerResolver
ArgumentResolver
Registry
ResourceNotFoundException

функция handle(Request): Response обрабатывает запрос, вызывает функции 
registerConfigs()
registerRoutes()
которые вызывают объекты, инициализирующие файлы конфигурации и роутинг

и process(request), которая распределяет запросы по объектам команд


*/

// 2 задание

// Найти в проекте паттерн Registry и объяснить, почему он был применён.

/*

class Registry предоставляет доступ к перменным файлов конфигурации и роутинга

*/

// 3 задание

// Добавить во все классы Repository использование 
// паттерна Identity Map вместо постоянного генерирования сущностей.


class IdentityMap
{
    private $identityMap = [];
 
    public function add($obj)
    {
        $key = $this->getGlobalKey(get_class($obj), $obj->getId());
 
        $this->identityMap[$key] = $obj;
    }
 
    public function get(string $classname, int $id)
    {
        $key = $this->getGlobalKey($classname, $id);
 
        if (isset($this->identityMap[$key])) {
            return $this->identityMap[$key];
        }
 
        throw new \Exception();
    }
 
    private function getGlobalKey(string $classname, int $id)
    {
        return sprintf('%s.%d', $classname, $id);
    }
}


abstract class AbstractMapper
{
  
  protected $identityMap;

  public function __construct($dataSource)
  {
    $this->identityMap = new IdentityMap();
  }

  public function __destruct()
  {
    unset($this->identityMap);
  }
}

class ProductMapper extends AbstractMapper
{

    /**
     * Проверка, есть ли продукт в identityMap
     *
     * @param array $product
     * @return Entity\Product
     */

    private function isMapped($product): Entity\Product
    {
        if($this->identityMap->get('Entity\Product', $product['id'])){
            return $this->identityMap->get('Entity\Product', $product['id']);
        } else {
            $product = new Entity\Product($product['id'], $product['name'], $product['price']);
            $this->identityMap->add($product);
            return $product;
        }
    }
    /**
     * Поиск продуктов по массиву id
     *
     * @param int[] $ids
     * @return Entity\Product[]
     */
    public function search(array $ids = []): array
    {
        if (!count($ids)) {
            return [];
        }

        $productList = [];
        foreach ($this->getDataFromSource(['id' => $ids]) as $item) {
            $productList[] = $this->isMapped($item);
        }

        return $productList;
    }

    /**
     * Получаем все продукты
     *
     * @return Entity\Product[]
     */
    public function fetchAll(): array
    {
        $productList = [];
        foreach ($this->getDataFromSource() as $item) {
            $productList[] = $this->isMapped($item);
        }

        return $productList;
    }

    /**
     * Получаем продукты из источника данных
     *
     * @param array $search
     *
     * @return array
     */
    private function getDataFromSource(array $search = [])
    {
        $dataSource = [
            [
                'id' => 1,
                'name' => 'PHP',
                'price' => 15300,
            ],
            [
                'id' => 2,
                'name' => 'Python',
                'price' => 20400,
            ],
            [
                'id' => 3,
                'name' => 'C#',
                'price' => 30100,
            ],
            [
                'id' => 4,
                'name' => 'Java',
                'price' => 30600,
            ],
            [
                'id' => 5,
                'name' => 'Ruby',
                'price' => 18600,
            ],
            [
                'id' => 8,
                'name' => 'Delphi',
                'price' => 8400,
            ],
            [
                'id' => 9,
                'name' => 'C++',
                'price' => 19300,
            ],
            [
                'id' => 10,
                'name' => 'C',
                'price' => 12800,
            ],
            [
                'id' => 11,
                'name' => 'Lua',
                'price' => 5000,
            ],
        ];

        if (!count($search)) {
            return $dataSource;
        }

        $productFilter = function (array $dataSource) use ($search): bool {
            return in_array($dataSource[key($search)], current($search), true);
        };

        return array_filter($dataSource, $productFilter);
    }
}

class UserMapper extends AbstractMapper
{
    
    /**
     * Проверка, есть ли пользователь в identityMap
     *
     * @param array $user
     * @return Entity\User
     */

    private function isMapped($user): Entity\User
    {
        if($this->identityMap->get('Entity\User', $user['id'])){
            return $this->identityMap->get('Entity\User', $user['id']);
        } else {
            $newUser = $this->createUser($user);
            $this->identityMap->add($newUser);
            return $newUser;
            }
    }
    /**
     * Получаем пользователя по идентификатору
     *
     * @param int $id
     * @return Entity\User|null
     */
    public function getById(int $id): ?Entity\User
    {
        foreach ($this->getDataFromSource(['id' => $id]) as $user) {
            $this->isMapped($user);
        }

        return null;
    }

    /**
     * Получаем пользователя по логину
     *
     * @param string $login
     * @return Entity\User
     */
    public function getByLogin(string $login): ?Entity\User
    {
        foreach ($this->getDataFromSource(['login' => $login]) as $user) {
            if ($user['login'] === $login) {
                $this->isMapped($user);
            }
        }

        return null;
    }

    /**
     * Фабрика по созданию сущности пользователя
     *
     * @param array $user
     * @return Entity\User
     */
    private function createUser(array $user): Entity\User
    {
        $role = $user['role'];

        return new Entity\User(
            $user['id'],
            $user['name'],
            $user['login'],
            $user['password'],
            new Entity\Role($role['id'], $role['title'], $role['role'])
        );
    }

    /**
     * Получаем пользователей из источника данных
     *
     * @param array $search
     *
     * @return array
     */
    private function getDataFromSource(array $search = [])
    {
        $admin = ['id' => 1, 'title' => 'Super Admin', 'role' => 'admin'];
        $user = ['id' => 1, 'title' => 'Main user', 'role' => 'user'];
        $test = ['id' => 1, 'title' => 'For test needed', 'role' => 'test'];

        $dataSource = [
            [
                'id' => 1,
                'name' => 'Super Admin',
                'login' => 'root',
                'password' => '$2y$10$GnZbayyccTIDIT5nceez7u7z1u6K.znlEf9Jb19CLGK0NGbaorw8W', // 1234
                'role' => $admin
            ],
            [
                'id' => 2,
                'name' => 'Doe John',
                'login' => 'doejohn',
                'password' => '$2y$10$j4DX.lEvkVLVt6PoAXr6VuomG3YfnssrW0GA8808Dy5ydwND/n8DW', // qwerty
                'role' => $user
            ],
            [
                'id' => 3,
                'name' => 'Ivanov Ivan Ivanovich',
                'login' => 'i**extends',
                'password' => '$2y$10$TcQdU.qWG0s7XGeIqnhquOH/v3r2KKbes8bLIL6NFWpqfFn.cwWha', // PaSsWoRd
                'role' => $user
            ],
            [
                'id' => 4,
                'name' => 'Test Testov Testovich',
                'login' => 'testok',
                'password' => '$2y$10$vQvuFc6vQQyon0IawbmUN.3cPBXmuaZYsVww5csFRLvLCLPTiYwMa', // testss
                'role' => $test
            ],
        ];

        if (!count($search)) {
            return $dataSource;
        }

        $productFilter = function (array $dataSource) use ($search): bool {
            return (bool) array_intersect($dataSource, $search);
        };

        return array_filter($dataSource, $productFilter);
    }
}