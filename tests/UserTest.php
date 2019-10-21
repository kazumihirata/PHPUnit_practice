<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testReturnsFullName()
    {
        $user = new User();

        $user->firstName = 'Kazumi';
        $user->lastName = 'Hirata';

        $this->assertEquals('Kazumi Hirata', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();
        $this->assertEquals('', $user->getFullName());
    }

    /**
     * @test
     * コメントに@testと記述するか、function名をtestで始めるとtest実行対象になる
     */
    public function userHasFirstName()
    {
        $user = new User();

        $user->firstName = 'Kazumi';
        $this->assertEquals('Kazumi', $user->firstName);
    }
}