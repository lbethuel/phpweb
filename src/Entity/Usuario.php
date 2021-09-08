<?php
namespace Alura\Armazenamento\Entity;
/**
 * @Entity
 * @Table(name="usuarios")
 */
class Usuario
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $email;
    /**
     * @Column(type="string")
     */
    private $senha;

    public function senhaEstaCorreta(string $senhaPura): bool
    {
        return password_verify($senhaPura, $this->senha);
    }
}

//vendor\bin\doctrine dbal:run-sql 'INSERT INTO usuarios (email, senha) VALUES ("bethuel.pg@gmail.com", "123456")';

//echo password_hash('123456', PASSWORD_ARGON2I);

//vendor\bin\doctrine dbal:run-sql "INSERT INTO usuarios (email, senha) VALUES ('bethuel.pg@gmail.com', '$argon2i$v=19$m=1024,t=2,p=2$NEJHU0NMZUptQnNHQTN2Mg$ai6vnv0KFL/S0RPF6NbOZZ3Urqe63xZBPNnbt54eV/o');"
