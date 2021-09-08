<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;

class Exclusao implements InterfaceControladorRequisicao
{

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            header('Location: /listar-cursos');
            return;
        }
        //var_dump($this->entityManager->getReference(Curso::class, $id));
        $curso = $this->entityManager->getReference(Curso::class, $id);
       
        $this->entityManager->remove($curso);
        $this->entityManager->flush();
        header('Location: /listar-cursos');

       
    }
}
