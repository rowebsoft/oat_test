<?php

namespace OAT\UserContext\Entity;

final class User
{

    const LOGIN = 'login';

    const PASSWORD = 'password';

    const TITLE = 'title';

    const LASTNAME = 'lastname';

    const FIRSTNAME = 'firstname';

    const GENDER = 'gender';

    const EMAIL = 'email';

    const PICTURE = 'picture';

    const ADDRESS = 'address';

    /**
     * @var string
     * username
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $picture;

    /**
     * @var string
     */
    private $address;

    /**
     * User constructor.
     * @param string $login
     * @param string $password
     * @param string $title
     * @param string $firstName
     * @param string $lastName
     * @param string $gender
     * @param string $email
     * @param string $picture
     * @param string $address
     */
    public function __construct($login, $password, $title, $firstName, $lastName, $gender, $email, $picture, $address)
    {
        $this->login = $login;
        $this->password = $password;
        $this->title = $title;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->email = $email;
        $this->picture = $picture;
        $this->address = $address;
    }


    /**
     * @param array $data
     *
     * @return self
     */
    public static function create(array $data)
    {
        return new self(
            $data[static::LOGIN],
            $data[static::PASSWORD],
            $data[static::TITLE],
            $data[static::FIRSTNAME],
            $data[static::LASTNAME],
            $data[static::GENDER],
            $data[static::EMAIL],
            $data[static::PICTURE],
            $data[static::ADDRESS]
        );
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            static::LOGIN       => $this->login,
//            static::PASSWORD => $this->password,#this is deliberated because i don't think a api should return password
            static::TITLE       => $this->title,
            static::FIRSTNAME   => $this->firstName,
            static::LASTNAME    => $this->lastName,
            static::GENDER      => $this->gender,
            static::EMAIL       => $this->email,
            static::PICTURE     => $this->picture,
            static::ADDRESS     => $this->address,
        ];
    }
}