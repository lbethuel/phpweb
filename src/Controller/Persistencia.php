<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Google\Service\AlertCenter\Resource\Alerts;

class Persistencia implements InterfaceControladorRequisicao
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */

    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        $descricao = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );

        /* $curso = new Curso();
        $curso->setDescricao($_POST['descricao']); */

        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (!is_null($id) && $id !== false) {
            $curso = $this->entityManager->find(Curso::class, $id);
            $curso->setDescricao($descricao);
        } else {
            $curso = new Curso();
            $curso->setDescricao($descricao);
            $this->entityManager->persist($curso);
        }
        $this->entityManager->flush();

        header('Location: /listar-cursos', true, 302);
    }
}
