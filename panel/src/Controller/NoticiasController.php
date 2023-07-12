<?php

namespace App\Controller;

use App\Entity\Noticias;
use App\Entity\User;
use App\Form\NoticiasRevisarType;
use App\Form\NoticiasType;
use App\Repository\EquiposRepository;
use App\Repository\NoticiasRepository;
use App\Repository\PartidoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * @Route("/user/noticias")
 */
class NoticiasController extends AbstractController
{
    /**
     * @Route("/", name="administrar_noticias", methods={"GET"})
     */
    public function administrar(NoticiasRepository $noticiasRepository): Response
    {
        $user = $this->getUser();
        $roles = $user->getRoles();

        $esAdmin = false;
        foreach ($roles as $rol) {
            if ($rol == 'ROLE_ADMIN') {
                $esAdmin = true;
            }
        }

        if (!$esAdmin) {
            return $this->redirectToRoute('noticias_mis_noticias');
        }

        return $this->render('noticias/administrar.html.twig', [
            'noticias' => $noticiasRepository->findBy([

            ],
            [
                'id' => 'DESC',
            ]),
        ]);
    }

    /**
     * @Route("/revisar/{id}", name="revisar_noticias", methods={"GET","POST"})
     */
    public function revisar(Request $request, Noticias $noticia, PartidoRepository $partidoRepository, EquiposRepository $equiposRepository): Response
    {
        $user = $this->getUser();
        $roles = $user->getRoles();

        $esAdmin = false;
        foreach ($roles as $rol) {
            if ($rol == 'ROLE_ADMIN') {
                $esAdmin = true;
            }
        }

        if (!$esAdmin) {
            return $this->redirectToRoute('noticias_mis_noticias');
        }

        $d = $this->getDoctrine();
        $em = $d->getManager();

        $options = [];
        $idsTemporadas = [];

        foreach ($noticia->getTemporada()->getValues() as $temporada) {
            $idsTemporadas[] = $temporada->getId();
        }

        $options['partidos'] = $partidoRepository->getPartidosListadoPorTemporadas($idsTemporadas);
        $options['equipos'] = $equiposRepository->getEquiposPorTemporadas($idsTemporadas);

        $form = $this->createForm(NoticiasRevisarType::class, $noticia, $options);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $noticia
                ->setTituloValidado($noticia->getTitulo())
                ->setDescripcionCortaValidada($noticia->getDescripcionCorta())
                ->setDescripcionValidada($noticia->getDescripcion())
            ;

            $em->persist($noticia);
            $em->flush();

            return $this->redirectToRoute('administrar_noticias');
        }

        return $this->render('noticias/revisar.html.twig', [
            'noticia' => $noticia,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/mis-noticias", name="noticias_mis_noticias", methods={"GET"})
     */
    public function misNoticias(NoticiasRepository $noticiasRepository): Response
    {
        $user = $this->getUser();

        return $this->render('noticias/index.html.twig', [
            'noticias' => $noticiasRepository->findBy([
                'usuario' => $user,
            ],['id' => 'DESC']),
        ]);
    }

    /**
     * @Route("/new", name="noticias_new", methods={"GET","POST"})
     */
    public function new(Request $request, PartidoRepository $partidoRepository, EquiposRepository $equiposRepository): Response
    {
        $user = $this->getUser();

        $noticia = new Noticias();
        $noticia->setUsuario($user);

        $options = [];

        if ($request->getMethod() == 'POST') {
            $temporadas = $request->request->get('noticias')['temporada'];
            $options['partidos'] = $partidoRepository->getPartidosListadoPorTemporadas($temporadas);
            $options['equipos'] = $equiposRepository->getEquiposPorTemporadas($temporadas);
        }

        $form = $this->createForm(NoticiasType::class, $noticia, $options);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $this->getUser();
            $roles = $user->getRoles();

            $esAdmin = false;
            foreach ($roles as $rol) {
                if ($rol == 'ROLE_ADMIN') {
                    $esAdmin = true;
                }
            }

            if (!$esAdmin) {
                $noticia
                    ->setEstado(0)
                ;
            } else {
                $noticia
                    ->setEstado(1)
                    ->setTituloValidado($noticia->getTitulo())
                    ->setDescripcionCortaValidada($noticia->getDescripcionCorta())
                    ->setDescripcionValidada($noticia->getDescripcion())
                ;
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($noticia);
            $entityManager->flush();

            if (!$esAdmin) {
                $headers = [];

                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=utf8';

                // Additional headers
                $headers[] = 'From: Futbolme <futbolme@futbolme.com>';
                $headers[] = 'Reply-To: ' . $user->getEmail();
                $headers[] = 'Bcc: c+999@cristian.pro';

                $router = $this->get('router');
                $urlNoticia = $router->generate('revisar_noticias', [
                    'id' => $noticia->getId(),
                ], UrlGeneratorInterface::ABSOLUTE_URL);

                $mensaje = $urlNoticia;

                #'futbolme@futbolme.com'

                mail('c@cristian.pro', '[REVISIÓN NOTICIAS] Nueva noticia publicada de ' . $user->getUsername() . ': ', $mensaje,  implode("\r\n", $headers));
            }

            return $this->redirectToRoute('noticias_mis_noticias');
        }

        return $this->render('noticias/new.html.twig', [
            'noticia' => $noticia,
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }

    /**
     * @Route("/cambio-campo-temporada", name="noticias_cambio_campo_temporada", methods={"POST"})
     */
    public function cambioCampoTemporada(Request $request, PartidoRepository $partidoRepository, EquiposRepository $equiposRepository): Response
    {
        $noticia = new Noticias();

        $temporadas = $request->request->get('temporadas');
        $partidos = $request->request->get('partidos');
        $equipos = $request->request->get('equipos');

        if ($partidos) {
            foreach ($partidos as $partido) {
                $noticia->addPartido($partidoRepository->find($partido));
            }
        }

        if ($equipos) {
            foreach ($equipos as $equipo) {
                $noticia->addEquipo($equiposRepository->find($equipo));
            }
        }

        $options = [];

        if ($temporadas) {
            $options['partidos'] = $partidoRepository->getPartidosListadoPorTemporadas($temporadas);
            $options['equipos'] = $equiposRepository->getEquiposPorTemporadas($temporadas);
        }

        $form = $this->createForm(NoticiasType::class, $noticia, $options);

        $campoPartidos = $this->renderView('noticias/_form_campo_partidos.html.twig', [
            'form' => $form->createView(),
        ]);

        $campoEquipo = $this->renderView('noticias/_form_campo_equipo.html.twig', [
            'form' => $form->createView(),
        ]);

        return new JsonResponse([
            'campoPartidos' => $campoPartidos,
            'campoEquipo' => $campoEquipo,
        ]);
    }

    /**
     * @Route("/{id}", name="noticias_show", methods={"GET"})
     */
    public function show(Noticias $noticia): Response
    {
        return $this->render('noticias/show.html.twig', [
            'noticia' => $noticia,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="noticias_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Noticias $noticia, PartidoRepository $partidoRepository, EquiposRepository $equiposRepository): Response
    {
        $em = $this->getDoctrine()->getManager();

        /** @var User $user */
        $user = $this->getUser();

        $idUsuarioNoticia = $noticia->getUsuario()->getId();

        if ($user->getId() != $idUsuarioNoticia) {
            return $this->redirectToRoute('noticias_mis_noticias');
        }

        $options = [];
        $idsTemporadas = [];

        foreach ($noticia->getTemporada()->getValues() as $temporada) {
            $idsTemporadas[] = $temporada->getId();
        }

        $options['partidos'] = $partidoRepository->getPartidosListadoPorTemporadas($idsTemporadas);
        $options['equipos'] = $equiposRepository->getEquiposPorTemporadas($idsTemporadas);

        $form = $this->createForm(NoticiasType::class, $noticia, $options);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $this->getUser();
            $roles = $user->getRoles();

            $esAdmin = false;
            foreach ($roles as $rol) {
                if ($rol == 'ROLE_ADMIN') {
                    $esAdmin = true;
                }
            }

            if (!$esAdmin) {
                $noticia
                    ->setEstado(0)
                ;
            } else {
                $noticia
                    ->setEstado(1)
                    ->setTituloValidado($noticia->getTitulo())
                    ->setDescripcionCortaValidada($noticia->getDescripcionCorta())
                    ->setDescripcionValidada($noticia->getDescripcion())
                ;
            }

            $em->persist($noticia);
            $em->flush();

            return $this->redirectToRoute('noticias_index');
        }

        return $this->render('noticias/edit.html.twig', [
            'noticia' => $noticia,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="noticias_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Noticias $noticia): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        $idUsuarioNoticia = $noticia->getUsuario()->getId();

        if ($user->getId() != $idUsuarioNoticia) {
            return $this->redirectToRoute('noticias_mis_noticias');
        }

        if ($this->isCsrfTokenValid('delete'.$noticia->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($noticia);
            $entityManager->flush();
        }

        return $this->redirectToRoute('noticias_mis_noticias');
    }
}
