<?php


namespace unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $user;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->user = new User();
    }

    public function test_can_get_firstname()
    {
        $this->user->setFirstName('Joel');
        $this->assertEquals($this->user->getFirstName(), 'Joel');
    }
    public function test_can_get_surname()
    {
        $this->user->setSurName('Mnisi');
        $this->assertEquals($this->user->getSurName(), 'Mnisi');
    }
    public function test_fullname()
    {
        $this->user->setFirstName('Joel');
        $this->user->setSurName('Mnisi');
        $this->assertEquals($this->user->getFullName(), 'Joel Mnisi');
    }
    public function test_firstname_and_surname_are_trimmed()
    {
        $this->user->setFirstName('  Joel ');
        $this->user->setSurName('             Mnisi');

        $this->assertEquals($this->user->getFirstName(), 'Joel');
        $this->assertEquals($this->user->getSurName(), 'Mnisi');
    }
    public function test_email_address_can_be_set()
    {
        $this->user->setEmailAddress('joel@mnisi.com');
        $this->assertEquals($this->user->getEmailAddress(), 'joel@mnisi.com');
    }
    public function test_email_variable_contains_correct_values()
    {
        $this->user->setFirstName('Joel');
        $this->user->setSurName('Mnisi');
        $this->user->setEmailAddress('Joel@Mnisi.com');

        $emailVariables = $this->user->getEmailVariables();
        $this->assertIsArray($emailVariables);
        $this->assertArrayHasKey('full_name',$emailVariables);
        $this->assertArrayHasKey('email',$emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Joel Mnisi');
        $this->assertEquals($emailVariables['email'], 'Joel@Mnisi.com');
    }
}