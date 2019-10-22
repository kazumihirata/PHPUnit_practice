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

    /**
     * Mockを使う
     */
    public function testNotificationIsSent()
    {
        $user = new User();

        $mockMailer = $this->createMock(Mailer::class);
        $mockMailer->expects($this->once())
                    ->method('sendMessage')
                    ->with($this->equalTo('kazumi@example.com'), $this->equalTo('hello'))
                    ->willReturn(true);

        $user->setMailer($mockMailer);
        $user->email = 'kazumi@example.com';
        $this->assertTrue($user->notify('hello'));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User();

        $mockMailer = $this->getMockBuilder(Mailer::class)
                        ->setMethods(null)
                        ->getMock();

        $user->setMailer($mockMailer);

        $this->expectException(Exception::class);

        $user->notify('hello');
    }
}